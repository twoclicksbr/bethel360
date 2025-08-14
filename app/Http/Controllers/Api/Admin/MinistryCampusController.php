<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\MinistryCampus;
use App\Http\Requests\Api\MinistryCampusRequest;

class MinistryCampusController extends Controller
{
    public function index(Request $request)
    {
        $query = MinistryCampus::query();

        if ($request->filled('id_ministry')) {
            $query->where('id_ministry', $request->id_ministry);
        }

        if ($request->filled('id_campus')) {
            $query->where('id_campus', $request->id_campus);
        }

        $query->orderBy('id', 'desc');

        $perPage = $request->get('per_page', 10);
        return response()->json([
            'data' => $query->paginate($perPage)
        ]);
    }

    public function store(MinistryCampusRequest $request)
    {
        $item = new MinistryCampus();
        $item->id_ministry = $request->id_ministry;
        $item->id_campus = $request->id_campus;
        $item->save();

        return response()->json([
            'message' => 'Vínculo criado com sucesso.',
            'data' => $item
        ], 201);
    }

    public function destroy($id)
    {
        $item = MinistryCampus::find($id);

        if (!$item) {
            return response()->json([
                'status' => 404,
                'error' => 'Vínculo não encontrado.'
            ], 404);
        }

        $item->delete();

        return response()->json(['message' => 'Vínculo excluído com sucesso.']);
    }
}
