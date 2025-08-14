<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\ThemeCelebrationOccurrence;
use App\Http\Requests\Api\ThemeCelebrationOccurrenceRequest;

class ThemeCelebrationOccurrenceController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeCelebrationOccurrence::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('id_theme_celebration')) {
            $query->where('id_theme_celebration', $request->id_theme_celebration);
        }

        if ($request->filled('starts_at')) {
            $query->whereDate('starts_at', $request->starts_at);
        }

        if ($request->filled('active')) {
            $query->where('active', $request->active);
        }

        $query->orderBy('starts_at', 'desc');

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage)
        ]);
    }

    public function store(ThemeCelebrationOccurrenceRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new ThemeCelebrationOccurrence();
        $item->id_credential = $idCredential;
        $item->id_theme_celebration = $request->id_theme_celebration;
        $item->starts_at = $request->starts_at;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Ocorrência criada com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(ThemeCelebrationOccurrenceRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = ThemeCelebrationOccurrence::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Ocorrência não encontrada.'
            ], 404);
        }

        $item->id_theme_celebration = $request->id_theme_celebration;
        $item->starts_at = $request->starts_at;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Ocorrência atualizada com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeCelebrationOccurrence::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Ocorrência não encontrada.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Ocorrência excluída com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeCelebrationOccurrence::where('id_credential', $idCredential)
            ->where('deleted', 1);

        if ($request->filled('id_theme_celebration')) {
            $query->where('id_theme_celebration', $request->id_theme_celebration);
        }

        $query->orderBy('starts_at', 'desc');

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage)
        ]);
    }

    public function restore($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeCelebrationOccurrence::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Ocorrência não encontrada.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Ocorrência restaurada com sucesso.']);
    }
}
