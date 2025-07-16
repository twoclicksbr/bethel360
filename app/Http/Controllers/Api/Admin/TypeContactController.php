<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\TypeContact;
use App\Http\Requests\Api\TypeContactRequest;

class TypeContactController extends Controller
{
    // Lista todos os tipos de contato da credencial logada
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = TypeContact::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
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

    // Mostra um ou mais tipos de contato
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

        $itens = TypeContact::where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->whereIn('id', $ids)
            ->get();

        if ($itens->isEmpty()) {
            return response()->json([
                'status' => 404,
                'error' => 'Nenhum registro encontrado.',
                'ids' => $ids
            ], 404);
        }

        return response()->json($itens);
    }

    // Cria novo tipo de contato
    public function store(TypeContactRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new TypeContact();
        $item->id_credential = $idCredential;
        $item->name = $request->name;
        $item->mask = $request->mask;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Tipo de contato criado com sucesso.',
            'data' => $item
        ], 201);
    }

    // Atualiza tipo de contato
    public function update(TypeContactRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = TypeContact::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tipo de contato não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->name = $request->name;
        $item->mask = $request->mask;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Tipo de contato atualizado com sucesso.']);
    }

    // Exclusão lógica
    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = TypeContact::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tipo de contato não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Tipo de contato excluído com sucesso.']);
    }

    // Lista excluídos
    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = TypeContact::where('id_credential', $idCredential)
            ->where('deleted', 1);

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
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

    // Restaura registro
    public function restore($id)
    {
        $idCredential = authIdCredential();

        $item = TypeContact::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tipo de contato não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Tipo de contato restaurado com sucesso.']);
    }
}
