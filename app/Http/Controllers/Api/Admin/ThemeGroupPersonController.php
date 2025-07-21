<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\ThemeGroupPerson;
use App\Http\Requests\Api\ThemeGroupPersonRequest;

class ThemeGroupPersonController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeGroupPerson::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('id_theme_group')) {
            $query->where('id_theme_group', $request->id_theme_group);
        }

        if ($request->filled('id_person')) {
            $query->where('id_person', $request->id_person);
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

        $item = ThemeGroupPerson::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Participação não encontrada.'
            ], 404);
        }

        return response()->json($item);
    }

    public function store(ThemeGroupPersonRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new ThemeGroupPerson();
        $item->id_credential = $idCredential;
        $item->id_theme_group = $request->id_theme_group;
        $item->id_person = $request->id_person;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Participante adicionado com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(ThemeGroupPersonRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroupPerson::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Participação não encontrada.'
            ], 404);
        }

        $item->id_theme_group = $request->id_theme_group;
        $item->id_person = $request->id_person;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Participação atualizada com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroupPerson::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Participação não encontrada.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Participação excluída com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeGroupPerson::where('id_credential', $idCredential)
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

        $item = ThemeGroupPerson::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Participação não encontrada.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Participação restaurada com sucesso.']);
    }
}
