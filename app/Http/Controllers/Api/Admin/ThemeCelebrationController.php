<?php

namespace App\Http\Controllers\Api\Admin;

use App\Console\Commands\GenerateCelebrationOccurrences;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\ThemeCelebration;
use App\Http\Requests\Api\ThemeCelebrationRequest;
use App\Models\Api\ThemeCelebrationOccurrence;

class ThemeCelebrationController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeCelebration::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('weekday')) {
            $query->where('weekday', $request->weekday);
        }

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

        $item = ThemeCelebration::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Celebração não encontrada.'
            ], 404);
        }

        return response()->json($item);
    }

    public function store(ThemeCelebrationRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new ThemeCelebration();
        $item->id_credential = $idCredential;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->weekday = $request->weekday;
        $item->start_time = $request->start_time;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        // Gera ocorrências somente para este culto
        $command = new GenerateCelebrationOccurrences();
        $command->generateFor($item); // método customizado só pra esse culto

        return response()->json([
            'message' => 'Celebração criada com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(ThemeCelebrationRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = ThemeCelebration::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Celebração não encontrada.'
            ], 404);
        }

        $item->name = $request->name;
        $item->description = $request->description;
        $item->weekday = $request->weekday;
        $item->start_time = $request->start_time;
        $item->active = $request->active ?? $item->active;
        $item->save();

        // Remove ocorrências antigas dessa celebração
        ThemeCelebrationOccurrence::where('id_theme_celebration', $item->id)->delete();

        // Gera novas
        $command = new GenerateCelebrationOccurrences();
        $command->generateFor($item);

        return response()->json(['message' => 'Celebração atualizada com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeCelebration::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Celebração não encontrada.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Celebração excluída com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeCelebration::where('id_credential', $idCredential)
            ->where('deleted', 1);

        if ($request->filled('weekday')) {
            $query->where('weekday', $request->weekday);
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

        $item = ThemeCelebration::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Celebração não encontrada.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Celebração restaurada com sucesso.']);
    }
}
