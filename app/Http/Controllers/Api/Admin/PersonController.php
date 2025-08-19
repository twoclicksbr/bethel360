<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Person;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Api\AddressRequest;



use App\Http\Requests\Api\PersonRequest;


class PersonController extends Controller
{
    // Lista todas as pessoas da credencial logada
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = Person::with(['gender', 'documents', 'addresses'])
            ->where('id_credential', $idCredential);

        // 👇 Filtra por excluídos
        if ($request->filled('show_deleted')) {
            $query->where('deleted', 1);
        } else {
            $query->where('deleted', 0);
        }

        // 🔍 Filtros por Id
        if ($request->filled('search_id')) {
            $value = $request->search_id;

            if (Str::contains($value, '-')) {
                [$start, $end] = explode('-', $value);
                $query->whereBetween('id', [(int) trim($start), (int) trim($end)]);
            } elseif (Str::contains($value, ',')) {
                $ids = array_map('intval', explode(',', $value));
                $query->whereIn('id', $ids);
            } else {
                $query->where('id', (int) $value);
            }
        }

        // 📄 Filtro por Nome
        if ($request->filled('search_name')) {
            $query->where('name', 'like', '%' . $request->search_name . '%');
        }

        // 📄 Filtro por Status
        if ($request->filled('search_active')) {
            $query->where('active', $request->search_active);
        }

        // 📄 Filtro por Gênero
        if ($request->filled('id_gender')) {
            $query->where('id_gender', $request->id_gender);
        }

        // 📄 Filtro por Data de Nascimento
        if ($request->filled('birthdate')) {
            $today = now();
            if ($request->birthdate === 'day') {
                $query->whereDay('birthdate', $today->day)
                    ->whereMonth('birthdate', $today->month);
            } elseif ($request->birthdate === 'week') {
                $query->whereBetween(DB::raw('DATE_FORMAT(birthdate, "%m-%d")'), [
                    $today->copy()->startOfWeek()->format('m-d'),
                    $today->copy()->endOfWeek()->format('m-d'),
                ]);
            } elseif ($request->birthdate === 'month') {
                $query->whereMonth('birthdate', $today->month);
            }
        }

        // 📄 Filtro por Cidade
        if ($request->filled('city')) {
            $query->whereHas('addresses', function ($q) use ($request) {
                $q->where('target_table', 'person')
                    ->where('deleted', 0)
                    ->where('city', $request->city);
            });
        }

        // 📄 Filtro por Documento
        if ($request->filled('typeDocument') && $request->filled('valueDocument')) {
            $query->whereHas('documents', function ($q) use ($request) {
                $q->where('id_type_document', $request->typeDocument)
                    ->where('value', $request->valueDocument)
                    ->where('deleted', 0);
            });
        }

        // 📄 Filtro por Tipo de data e intervalo
        if ($request->filled('search_date_type') && $request->filled('search_date_range')) {
            $dates = explode(' a ', $request->search_date_range);

            try {
                $start = \Carbon\Carbon::parse(trim($dates[0]))->startOfDay();
                $end = isset($dates[1])
                    ? \Carbon\Carbon::parse(trim($dates[1]))->endOfDay()
                    : \Carbon\Carbon::parse(trim($dates[0]))->endOfDay();

                $query->whereBetween($request->search_date_type, [$start, $end]);
            } catch (\Exception $e) {
                // ignora filtro inválido
            }
        }

        // 🔃 Ordenação dinâmica
        $allowedSorts = ['id', 'name', 'birthdate', 'id_gender', 'active', 'created_at'];
        $sort = in_array($request->get('sort'), $allowedSorts) ? $request->get('sort') : 'name';
        $direction = $request->get('direction') === 'desc' ? 'desc' : 'asc';

        // 🔁 Paginação
        $perPage = $request->paginate === 'all' ? 999999 : ($request->paginate ?? 10);
        $paginator = $query->orderBy($sort, $direction)
            ->paginate($perPage)
            ->appends($request->query());

        // 🔄 Formata os dados e mantém paginação
        $mappedData = $paginator->getCollection()->map(function ($person) {
            return [
                'id'         => $person->id,
                'name'       => $person->name,
                'birthdate'  => $person->birthdate,
                'active'     => $person->active,
                'id_gender'  => $person->id_gender,
                'gender'     => $person->gender,
                'created_at' => $person->getRawOriginal('created_at'),
                'updated_at' => $person->getRawOriginal('updated_at'),
            ];
        });

        $paginated = new LengthAwarePaginator(
            $mappedData,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
            ['path' => request()->url(), 'query' => $request->query()]
        );

        return response()->json([
            'status'  => true,
            'message' => 'Listagem de pessoas',
            'data'    => $paginated,
        ]);
    }


    // Retorna os dados de uma pessoa específica
    public function show($ids)
    {
        // dd('ENTROU NO SHOW');

        $idCredential = authIdCredential();

        // Detecta formato: intervalo, lista ou único
        if (str_contains($ids, '-')) {
            [$start, $end] = explode('-', $ids);
            $ids = range((int)$start, (int)$end);
        } elseif (str_contains($ids, ',')) {
            $ids = explode(',', $ids);
        } else {
            $ids = [$ids];
        }

        // Consulta protegida
        $pessoas = Person::where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->whereIn('id', $ids)
            ->get();

        if ($pessoas->isEmpty()) {
            return response()->json([
                'status' => 404,
                'error' => 'Nenhum registro encontrado.',
                'ids' => $ids
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $pessoas->count() === 1 ? $pessoas->first() : $pessoas
        ]);
    }

    // Cria uma nova pessoa vinculada à credencial logada
    public function store(PersonRequest $request)
    {
        $idCredential = $request->get('authIdCredential');

        $pessoa = new Person();
        $pessoa->id_credential = $request->get('authIdCredential');
        $pessoa->id_gender     = $request->id_gender;
        $pessoa->name          = $request->name;
        $pessoa->birthdate     = $request->birthdate;
        $pessoa->active        = $request->active ?? 1;
        $pessoa->deleted       = 0;
        $pessoa->save();

        return response()->json([
            'message' => 'Pessoa criada com sucesso.',
            'data' => $pessoa
        ], 201);
    }

    // Atualiza os dados de uma pessoa da credencial logada
    public function update(PersonRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $pessoa = Person::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$pessoa) {
            return response()->json([
                'status' => 404,
                'error' => 'Pessoa não encontrada ou não pertence à sua credencial.'
            ], 404);
        }

        $pessoa->id_gender = $request->id_gender ?? $pessoa->id_gender;
        $pessoa->name      = $request->name;
        $pessoa->birthdate = $request->birthdate;
        $pessoa->active    = $request->active ?? $pessoa->active;
        $pessoa->save();

        return response()->json([
            'status' => true,
            'message' => 'Pessoa atualizada com sucesso.'
        ]);
    }

    // Exclusão lógica da pessoa
    public function destroy($id)
    {
        // dd('ENTROU NO DESTROY');

        $idCredential = authIdCredential();

        $pessoa = Person::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$pessoa) {
            return response()->json([
                'status' => 404,
                'error' => 'Pessoa não encontrada ou não pertence à sua credencial.'
            ], 404);
        }

        $pessoa->deleted = 1;
        $pessoa->save();

        return response()->json(['message' => 'Pessoa excluída com sucesso.']);
    }

    // Lista todas as pessoas "DELETADA" da credencial logada
    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = Person::with('gender')
            ->where('id_credential', $idCredential)
            ->where('deleted', 1);

        // Filtros opcionais
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('birthdate')) {
            $query->whereDate('birthdate', $request->birthdate);
        }

        // Ordenação
        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'desc');
        $query->orderBy($sort, $direction);

        // Paginação
        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage),
            'sort' => $sort,
            'direction' => $direction,
        ]);
    }

    // Restauração lógica da pessoa
    public function restore($id)
    {
        $idCredential = authIdCredential();

        $pessoa = Person::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$pessoa) {
            return response()->json([
                'status' => 404,
                'error' => 'Pessoa não encontrada ou não pertence à sua credencial.'
            ], 404);
        }

        $pessoa->deleted = 0;
        $pessoa->save();

        return response()->json(['message' => 'Pessoa restaurada com sucesso.']);
    }

    public function batchStatus(Request $request)
    {
        $ids    = $request->input('ids', []);
        $action = $request->input('action');

        if (empty($ids) || !in_array($action, ['public', 'inactive', 'delete'])) {
            return response()->json(['status' => false, 'message' => 'Parâmetros inválidos.'], 400);
        }

        $active  = null;
        $deleted = null;

        if ($action === 'public') {
            $active = 1;
        } elseif ($action === 'inactive') {
            $active = 0;
        } elseif ($action === 'delete') {
            $deleted = 1;
        }

        $query = Person::whereIn('id', $ids)
            ->where('id_credential', $request->authIdCredential);

        if (!is_null($active)) {
            $query->update(['active' => $active]);
        }

        if (!is_null($deleted)) {
            $query->update(['deleted' => $deleted]);
        }

        return response()->json(['status' => true, 'message' => 'Registros atualizados com sucesso.']);
    }

    public function storeAddress(Request $request, $id)
    {
        $request->merge([
            'id_target' => $id,
            'target_table' => 'person',
            'authIdCredential' => authIdCredential(),
        ]);

        $request->validate([
            'zipcode' => 'required',
            'street' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'state' => 'required',
            'id_type_address' => 'required',
        ]);

        $controller = new \App\Http\Controllers\Api\Admin\AddressController();
        $addressRequest = AddressRequest::createFrom($request);
        return $controller->store($addressRequest);
    }
}
