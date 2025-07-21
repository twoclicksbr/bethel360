<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\File;
use App\Http\Requests\Api\FileRequest;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $idCredential = authIdCredential();

        $query = File::where('id_credential', $idCredential)
            ->where('deleted', 0);

        if ($request->filled('target_table')) {
            $query->where('target_table', $request->target_table);
        }

        if ($request->filled('id_target')) {
            $query->where('id_target', $request->id_target);
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
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

        $itens = File::where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->whereIn('id', $ids)
            ->get();

        if ($itens->isEmpty()) {
            return response()->json([
                'status' => 404,
                'error' => 'Nenhum arquivo encontrado.',
                'ids' => $ids
            ], 404);
        }

        return response()->json($itens);
    }

    public function store(FileRequest $request)
    {
        $idCredential = authIdCredential();

        $file = $request->file('file');

        if (!$file || !$file->isValid()) {
            return response()->json(['error' => 'Arquivo inválido.'], 400);
        }

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads/files', $filename, 'public');

        $item = new File();
        $item->id_credential = $idCredential;
        $item->target_table = $request->target_table;
        $item->id_target = $request->id_target;
        $item->name = $request->name ?? $file->getClientOriginalName();
        $item->path = $path;
        $item->type = $file->getClientMimeType();
        $item->size = $file->getSize();
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Arquivo salvo com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(FileRequest $request, $id)
    {
        $idCredential = authIdCredential();

        $item = File::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Arquivo não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->name = $request->name ?? $item->name;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Arquivo atualizado com sucesso.']);
    }

    public function destroy($id)
    {
        $idCredential = authIdCredential();

        $item = File::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Arquivo não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Arquivo excluído com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $idCredential = authIdCredential();

        $query = File::where('id_credential', $idCredential)
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

        $item = File::where('id', $id)
            ->where('id_credential', $idCredential)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Arquivo não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Arquivo restaurado com sucesso.']);
    }
}
