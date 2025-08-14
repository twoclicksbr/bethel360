<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\ThemeGroupMaterial;
use App\Http\Requests\Api\ThemeGroupMaterialRequest;

class ThemeGroupMaterialController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeGroupMaterial::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('id_theme_group')) {
            $query->where('id_theme_group', $request->id_theme_group);
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
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

        $item = ThemeGroupMaterial::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Material não encontrado.'
            ], 404);
        }

        return response()->json($item);
    }

    public function store(ThemeGroupMaterialRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new ThemeGroupMaterial();
        $item->id_credential = $idCredential;
        $item->id_theme_group = $request->id_theme_group;
        $item->title = $request->title;
        $item->id_file = $request->id_file;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Material adicionado com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(ThemeGroupMaterialRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroupMaterial::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Material não encontrado.'
            ], 404);
        }

        $item->id_theme_group = $request->id_theme_group;
        $item->title = $request->title;
        $item->id_file = $request->id_file;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Material atualizado com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroupMaterial::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Material não encontrado.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Material excluído com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeGroupMaterial::where('id_credential', $idCredential)
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

        $item = ThemeGroupMaterial::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Material não encontrado.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Material restaurado com sucesso.']);
    }
}
