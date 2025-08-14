<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Api\LogOperation;
use App\Http\Requests\Api\LogOperationRequest;
use Illuminate\Http\Request;

class LogOperationController extends Controller
{
    public function index(Request $request)
    {
        $query = LogOperation::where('id_credential', authIdCredential())
            ->where('deleted', 0);

        if ($request->filled('module')) {
            $query->where('module', $request->module);
        }

        if ($request->filled('action')) {
            $query->where('action', $request->action);
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
        if (str_contains($ids, '-')) {
            [$start, $end] = explode('-', $ids);
            $ids = range((int) $start, (int) $end);
        } elseif (str_contains($ids, ',')) {
            $ids = explode(',', $ids);
        } else {
            $ids = [$ids];
        }

        $itens = LogOperation::where('id_credential', authIdCredential())
            ->where('deleted', 0)
            ->whereIn('id', $ids)
            ->get();

        if ($itens->isEmpty()) {
            return response()->json([
                'status' => 404,
                'error' => 'Nenhum log encontrado.',
                'ids' => $ids
            ], 404);
        }

        return response()->json($itens);
    }

    public function store(LogOperationRequest $request)
    {
        $item = new LogOperation();
        $item->id_credential = authIdCredential();
        $item->id_person     = authIdPerson();
        $item->module        = $request->module;
        $item->action        = $request->action;
        $item->details       = $request->details;
        $item->active        = 1;
        $item->deleted       = 0;
        $item->created_at    = now();
        $item->save();

        return response()->json(['message' => 'Log registrado com sucesso.', 'data' => $item], 201);
    }

    public function update(LogOperationRequest $request, $id)
    {
        $item = LogOperation::where('id', $id)
            ->where('id_credential', authIdCredential())
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Log não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->module  = $request->module;
        $item->action  = $request->action;
        $item->details = $request->details;
        $item->save();

        return response()->json(['message' => 'Log atualizado com sucesso.']);
    }

    public function destroy($id)
    {
        $item = LogOperation::where('id', $id)
            ->where('id_credential', authIdCredential())
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Log não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Log excluído com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $query = LogOperation::where('id_credential', authIdCredential())
            ->where('deleted', 1);

        if ($request->filled('module')) {
            $query->where('module', $request->module);
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
        $item = LogOperation::where('id', $id)
            ->where('id_credential', authIdCredential())
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Log não encontrado ou não pertence à sua credencial.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Log restaurado com sucesso.']);
    }
}
