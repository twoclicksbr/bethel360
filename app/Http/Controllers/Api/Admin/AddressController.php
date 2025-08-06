<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Address;
use App\Http\Requests\Api\AddressRequest;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = Address::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('target_table')) {
            $query->where('target_table', $request->target_table);
        }

        if ($request->filled('id_target')) {
            $query->where('id_target', $request->id_target);
        }

        if ($request->filled('id_type_address')) {
            $query->where('id_type_address', $request->id_type_address);
        }

        if ($request->filled('zipcode')) {
            $query->where('zipcode', 'like', '%' . $request->zipcode . '%');
        }

        if ($request->filled('active')) {
            $query->where('active', $request->active);
        }

        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'desc');
        $query->orderBy($sort, $direction);

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage),
            'sort' => $sort,
            'direction' => $direction,
        ]);
    }

    public function show($ids)
    {
        $idCredential = authIdCredential();

        if (str_contains($ids, '-')) {
            [$start, $end] = explode('-', $ids);
            $ids = range((int)$start, (int)$end);
        } elseif (str_contains($ids, ',')) {
            $ids = explode(',', $ids);
        } else {
            $ids = [$ids];
        }

        $itens = Address::where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->whereIn('id', $ids)
            ->get();

        if ($itens->isEmpty()) {
            return response()->json([
                'status' => 404,
                'error' => 'Nenhum endereço encontrado.',
                'ids' => $ids
            ], 404);
        }

        return response()->json($itens);
    }

    public function store(AddressRequest $request)
    {
        $idCredential = $request->get('authIdCredential');

        if ($request->main) {
            Address::where('id_target', $request->id_target)
                ->where('target_table', $request->target_table)
                ->where('id_credential', $idCredential)
                ->where('deleted', 0)
                ->update(['main' => 0]);
        }

        $endereco = new Address();
        $endereco->id_credential    = $idCredential;
        $endereco->target_table     = $request->target_table;
        $endereco->id_target        = $request->id_target;
        $endereco->id_type_address  = $request->id_type_address;
        $endereco->zipcode          = $request->zipcode;
        $endereco->street           = $request->street;
        $endereco->number           = $request->number;
        $endereco->complement       = $request->complement;
        $endereco->neighborhood     = $request->neighborhood;
        $endereco->city             = $request->city;
        $endereco->state            = $request->state;
        $endereco->country          = $request->country;
        $endereco->main             = $request->main ?? 0;
        $endereco->active           = $request->active ?? 1;
        $endereco->deleted          = 0;
        $endereco->save();

        return response()->json([
            'message' => 'Endereço criado com sucesso.',
            'data'    => $endereco,
        ], 201);
    }

    public function update(AddressRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = Address::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Endereço não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        if ($request->main && $item->main != 1) {
            Address::where('id_target', $request->id_target)
                ->where('target_table', $request->target_table)
                ->where('id_credential', $idCredential)
                ->where('deleted', 0)
                ->update(['main' => 0]);
        }

        $item->target_table = $request->target_table;
        $item->id_target = $request->id_target;
        $item->id_type_address = $request->id_type_address;
        $item->zipcode = $request->zipcode;
        $item->street = $request->street;
        $item->number = $request->number;
        $item->complement = $request->complement;
        $item->neighborhood = $request->neighborhood;
        $item->city = $request->city;
        $item->state = $request->state;
        $item->country = $request->country;
        $item->main = $request->main ?? $item->main;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Endereço atualizado com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = Address::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Endereço não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Endereço excluído com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = Address::where('id_credential', $idCredential)
            ->where('deleted', 1);

        if ($request->filled('target_table')) {
            $query->where('target_table', $request->target_table);
        }

        if ($request->filled('id_target')) {
            $query->where('id_target', $request->id_target);
        }

        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'desc');
        $query->orderBy($sort, $direction);

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage),
            'sort' => $sort,
            'direction' => $direction,
        ]);
    }

    public function restore($id)
    {
        $idCredential = authIdCredential();

        $item = Address::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Endereço não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Endereço restaurado com sucesso.']);
    }
}
