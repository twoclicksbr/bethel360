<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Person;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\Api\PersonRequest;


class PersonController extends Controller
{
    // Lista todas as pessoas da credencial logada
    public function index(Request $request)
    {
        // dd('ENTROU NO INDEX');

        $idCredential = authIdCredential();

        $query = Person::with('gender')
            ->where('id_credential', $idCredential)
            ->where('deleted', 0);

        // Filtros por campo
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('birthdate')) {
            $query->whereDate('birthdate', $request->birthdate);
        }

        if ($request->filled('active')) {
            $query->where('active', $request->active);
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
}
