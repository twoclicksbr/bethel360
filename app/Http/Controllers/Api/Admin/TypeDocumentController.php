<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\TypeDocument;
use App\Http\Requests\Api\TypeDocumentRequest;

class TypeDocumentController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = TypeDocument::where('id_credential', $idCredential)
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

        $itens = TypeDocument::where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->whereIn('id', $ids)
            ->get();

        if ($itens->isEmpty()) {
            return response()->json([
                'status' => 404,
                'error' => 'Nenhum tipo de documento encontrado.',
                'ids' => $ids
            ], 404);
        }

        return response()->json($itens);
    }

    public function store(TypeDocumentRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new TypeDocument();
        $item->id_credential = $idCredential;
        $item->name = $request->name;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Tipo de documento criado com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(TypeDocumentRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = TypeDocument::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tipo de documento não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->name = $request->name;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Tipo de documento atualizado com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = TypeDocument::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tipo de documento não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Tipo de documento excluído com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = TypeDocument::where('id_credential', $idCredential)
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

    public function restore($id)
    {
        $idCredential = authIdCredential();

        $item = TypeDocument::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tipo de documento não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Tipo de documento restaurado com sucesso.']);
    }
}
