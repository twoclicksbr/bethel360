<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\ThemeMinistry;
use App\Http\Requests\Api\ThemeMinistryRequest;

class ThemeMinistryController extends Controller
{
    public function index(Request $request)
    {
        $query = ThemeMinistry::where('deleted', 0);

        if ($request->filled('id_credential')) {
            $query->where('id_credential', $request->id_credential);
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('label')) {
            $query->where('label', 'like', '%' . $request->label . '%');
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
            $ids = range((int)$start, (int)$end);
        } elseif (str_contains($ids, ',')) {
            $ids = explode(',', $ids);
        } else {
            $ids = [$ids];
        }

        $itens = ThemeMinistry::where('deleted', 0)
            ->whereIn('id', $ids)
            ->get();

        if ($itens->isEmpty()) {
            return response()->json([
                'status' => 404,
                'error' => 'Nenhum tema encontrado.',
                'ids' => $ids
            ], 404);
        }

        return response()->json($itens);
    }

    public function store(ThemeMinistryRequest $request)
    {
        $item = new ThemeMinistry();
        $item->id_credential = $request->id_credential;
        $item->name = $request->name;
        $item->label = $request->label;
        $item->description = $request->description;
        $item->active = $request->active ?? 1;
        $item->deleted = 0;
        $item->save();

        return response()->json([
            'message' => 'Tema criado com sucesso.',
            'data' => $item
        ], 201);
    }

    public function update(ThemeMinistryRequest $request, $id)
    {
        $item = ThemeMinistry::where('id', $id)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tema não encontrado.'
            ], 404);
        }

        $item->id_credential = $request->id_credential;
        $item->name = $request->name;
        $item->label = $request->label;
        $item->description = $request->description;
        $item->active = $request->active ?? $item->active;
        $item->save();

        return response()->json(['message' => 'Tema atualizado com sucesso.']);
    }

    public function destroy($id)
    {
        $item = ThemeMinistry::where('id', $id)
            ->where('deleted', 0)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tema não encontrado.'
            ], 404);
        }

        $item->deleted = 1;
        $item->save();

        return response()->json(['message' => 'Tema excluído com sucesso.']);
    }

    public function deleted(Request $request)
    {
        $query = ThemeMinistry::where('deleted', 1);

        if ($request->filled('id_credential')) {
            $query->where('id_credential', $request->id_credential);
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

    public function restore($id)
    {
        $item = ThemeMinistry::where('id', $id)
            ->where('deleted', 1)
            ->first();

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Tema não encontrado.'
            ], 404);
        }

        $item->deleted = 0;
        $item->save();

        return response()->json(['message' => 'Tema restaurado com sucesso.']);
    }
}
