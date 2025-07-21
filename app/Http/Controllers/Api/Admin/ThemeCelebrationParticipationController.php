<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\ThemeCelebrationParticipation;
use App\Http\Requests\Api\ThemeCelebrationParticipationRequest;

class ThemeCelebrationParticipationController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeCelebrationParticipation::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('id_theme_celebration_occurrence')) {
            $query->where('id_theme_celebration_occurrence', $request->id_theme_celebration_occurrence);
        }

        if ($request->filled('id_ministry')) {
            $query->where('id_ministry', $request->id_ministry);
        }

        if ($request->filled('id_person')) {
            $query->where('id_person', $request->id_person);
        }

        $query->orderBy('id', 'desc');

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage)
        ]);
    }

    public function store(ThemeCelebrationParticipationRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new ThemeCelebrationParticipation();
        $item->id_credential = $idCredential;
        $item->id_theme_celebration_occurrence = $request->id_theme_celebration_occurrence;
        $item->id_ministry = $request->id_ministry;
        $item->id_person = $request->id_person;
        $item->role = $request->role;
        $item->entry_at = $request->entry_at;
        $item->exit_at = $request->exit_at;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Participação registrada com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(ThemeCelebrationParticipationRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = ThemeCelebrationParticipation::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Participação não encontrada.'
            ], 404);
        }

        $item->id_theme_celebration_occurrence = $request->id_theme_celebration_occurrence;
        $item->id_ministry = $request->id_ministry;
        $item->id_person = $request->id_person;
        $item->role = $request->role;
        $item->entry_at = $request->entry_at;
        $item->exit_at = $request->exit_at;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Participação atualizada com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeCelebrationParticipation::where('id', $id)
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

        $query = ThemeCelebrationParticipation::where('id_credential', $idCredential)
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

        $item = ThemeCelebrationParticipation::where('id', $id)
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
