<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\TypeGroup;
use App\Http\Requests\Api\TypeGroupRequest;

class TypeGroupController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = TypeGroup::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('active')) {
            $query->where('active', $request->active);
        }

        $query->orderBy('id', 'desc');

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage)
        ]);
    }

    public function show($id)
    {
        $idCredential = authIdCredential();

        $item = TypeGroup::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tipo de grupo não encontrado.'
            ], 404);
        }

        return response()->json($item);
    }

    public function store(TypeGroupRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new TypeGroup();
        $item->id_credential = $idCredential;
        $item->name = $request->name;
        $item->mask = $request->mask;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Tipo de grupo criado com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(TypeGroupRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = TypeGroup::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tipo de grupo não encontrado.'
            ], 404);
        }

        $item->name = $request->name;
        $item->mask = $request->mask;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Tipo de grupo atualizado com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = TypeGroup::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tipo de grupo não encontrado.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Tipo de grupo excluído com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = TypeGroup::where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->orderBy('id', 'desc');

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage)
        ]);
    }

    public function restore($id)
    {
        $idCredential = authIdCredential();

        $item = TypeGroup::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tipo de grupo não encontrado.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Tipo de grupo restaurado com sucesso.']);
    }
}
