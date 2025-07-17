<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\ThemeGroupAttendance;
use App\Http\Requests\Api\ThemeGroupAttendanceRequest;

class ThemeGroupAttendanceController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeGroupAttendance::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('id_theme_group_lesson')) {
            $query->where('id_theme_group_lesson', $request->id_theme_group_lesson);
        }

        if ($request->filled('id_person')) {
            $query->where('id_person', $request->id_person);
        }

        if ($request->filled('present')) {
            $query->where('present', $request->present);
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

        $item = ThemeGroupAttendance::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Registro de presença não encontrado.'
            ], 404);
        }

        return response()->json($item);
    }

    public function store(ThemeGroupAttendanceRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new ThemeGroupAttendance();
        $item->id_credential = $idCredential;
        $item->id_theme_group_lesson = $request->id_theme_group_lesson;
        $item->id_person = $request->id_person;
        $item->present = $request->present;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Presença registrada com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(ThemeGroupAttendanceRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroupAttendance::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Registro de presença não encontrado.'
            ], 404);
        }

        $item->id_theme_group_lesson = $request->id_theme_group_lesson;
        $item->id_person = $request->id_person;
        $item->present = $request->present;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Presença atualizada com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroupAttendance::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Registro de presença não encontrado.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Registro de presença excluído com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeGroupAttendance::where('id_credential', $idCredential)
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

        $item = ThemeGroupAttendance::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Registro de presença não encontrado.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Registro de presença restaurado com sucesso.']);
    }
}
