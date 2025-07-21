<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\ThemeGroup;
use App\Http\Requests\Api\ThemeGroupRequest;

class ThemeGroupController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeGroup::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('id_type_group')) {
            $query->where('id_type_group', $request->id_type_group);
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

        $item = ThemeGroup::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Grupo não encontrado.'
            ], 404);
        }

        return response()->json($item);
    }

    public function store(ThemeGroupRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new ThemeGroup();
        $item->id_credential = $idCredential;
        $item->id_type_group = $request->id_type_group;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->location = $request->location;
        $item->id_person_leader = $request->id_person_leader;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Grupo criado com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(ThemeGroupRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroup::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Grupo não encontrado.'
            ], 404);
        }

        $item->id_type_group = $request->id_type_group;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->location = $request->location;
        $item->id_person_leader = $request->id_person_leader;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Grupo atualizado com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroup::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Grupo não encontrado.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Grupo excluído com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeGroup::where('id_credential', $idCredential)
            ->where('deleted', 1);

        $query->orderBy('id', 'desc');

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage)
        ]);
    }

    public function restore($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroup::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Grupo não encontrado.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Grupo restaurado com sucesso.']);
    }
}
