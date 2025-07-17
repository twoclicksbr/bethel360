<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\ThemeGroupLesson;
use App\Http\Requests\Api\ThemeGroupLessonRequest;

class ThemeGroupLessonController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeGroupLesson::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('id_theme_group')) {
            $query->where('id_theme_group', $request->id_theme_group);
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('active')) {
            $query->where('active', $request->active);
        }

        $query->orderBy('date', 'desc');

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage)
        ]);
    }

    public function show($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroupLesson::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Aula não encontrada.'
            ], 404);
        }

        return response()->json($item);
    }

    public function store(ThemeGroupLessonRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new ThemeGroupLesson();
        $item->id_credential = $idCredential;
        $item->id_theme_group = $request->id_theme_group;
        $item->title = $request->title;
        $item->description = $request->description;
        $item->date = $request->date;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Aula criada com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(ThemeGroupLessonRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroupLesson::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Aula não encontrada.'
            ], 404);
        }

        $item->id_theme_group = $request->id_theme_group;
        $item->title = $request->title;
        $item->description = $request->description;
        $item->date = $request->date;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Aula atualizada com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = ThemeGroupLesson::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Aula não encontrada.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Aula excluída com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = ThemeGroupLesson::where('id_credential', $idCredential)
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

        $item = ThemeGroupLesson::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Aula não encontrada.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Aula restaurada com sucesso.']);
    }
}
