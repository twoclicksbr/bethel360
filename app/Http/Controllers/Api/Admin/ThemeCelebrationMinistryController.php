<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\ThemeCelebrationMinistry;
use App\Http\Requests\Api\ThemeCelebrationMinistryRequest;

class ThemeCelebrationMinistryController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeCelebrationMinistry::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('id_theme_celebration_occurrence')) {
            $query->where('id_theme_celebration_occurrence', $request->id_theme_celebration_occurrence);
        }

        if ($request->filled('id_ministry')) {
            $query->where('id_ministry', $request->id_ministry);
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

    public function store(ThemeCelebrationMinistryRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new ThemeCelebrationMinistry();
        $item->id_credential = $idCredential;
        $item->id_theme_celebration_occurrence = $request->id_theme_celebration_occurrence;
        $item->id_ministry = $request->id_ministry;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Ministério escalado com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(ThemeCelebrationMinistryRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = ThemeCelebrationMinistry::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Registro não encontrado.'
            ], 404);
        }

        $item->id_theme_celebration_occurrence = $request->id_theme_celebration_occurrence;
        $item->id_ministry = $request->id_ministry;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Registro atualizado com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeCelebrationMinistry::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Registro não encontrado.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Registro excluído com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeCelebrationMinistry::where('id_credential', $idCredential)
            ->where('deleted', 1);

        if ($request->filled('id_theme_celebration_occurrence')) {
            $query->where('id_theme_celebration_occurrence', $request->id_theme_celebration_occurrence);
        }

        $query->orderBy('id', 'desc');

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage)
        ]);
    }

    public function restore($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeCelebrationMinistry::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Registro não encontrado.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Registro restaurado com sucesso.']);
    }
}
