<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Note;
use App\Http\Requests\Api\NoteRequest;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = Note::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('target_table')) {
            $query->where('target_table', $request->target_table);
        }

        if ($request->filled('id_target')) {
            $query->where('id_target', $request->id_target);
        }

        if ($request->filled('text')) {
            $query->where('text', 'like', '%' . $request->text . '%');
        }

        if ($request->filled('active')) {
            $query->where('active', $request->active);
        }

        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'desc');
        $query->orderBy($sort, $direction);

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage),
            'sort' => $sort,
            'direction' => $direction,
        ]);
    }

    public function show($ids)
    {
        $idCredential = authIdCredential();

        if (str_contains($ids, '-')) {
            [$start, $end] = explode('-', $ids);
            $ids = range((int)$start, (int)$end);
        } elseif (str_contains($ids, ',')) {
            $ids = explode(',', $ids);
        } else {
            $ids = [$ids];
        }

        $itens = Note::where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->whereIn('id', $ids)
            ->get();

        if ($itens->isEmpty()) {
            return response()->json([
                'status' => 404,
                'error' => 'Nenhuma observação encontrada.',
                'ids' => $ids
            ], 404);
        }

        return response()->json($itens);
    }

    public function store(NoteRequest $request)
    {
        $idCredential = authIdCredential();

        $item = new Note();
        $item->id_credential = $idCredential;
        $item->target_table = $request->target_table;
        $item->id_target = $request->id_target;
        $item->text = $request->text;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Observação criada com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(NoteRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = Note::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Observação não encontrada ou não pertence à sua credencial.'
            ], 404);
        }

        $item->text = $request->text;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Observação atualizada com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = Note::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Observação não encontrada ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Observação excluída com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = Note::where('id_credential', $idCredential)
            ->where('deleted', 1);

        if ($request->filled('target_table')) {
            $query->where('target_table', $request->target_table);
        }

        if ($request->filled('id_target')) {
            $query->where('id_target', $request->id_target);
        }

        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'desc');
        $query->orderBy($sort, $direction);

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage),
            'sort' => $sort,
            'direction' => $direction,
        ]);
    }

    public function restore($id)
    {
        $idCredential = authIdCredential();

        $item = Note::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Observação não encontrada ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Observação restaurada com sucesso.']);
    }
}
