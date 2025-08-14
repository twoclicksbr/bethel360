<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserFilterMemoryRequest;
use App\Models\Api\UserFilterMemory;
use Illuminate\Http\Request;

class UserFilterMemoryController extends Controller
{
    public function store(UserFilterMemoryRequest $request)
    {
        $data = $request->validated();

        $record = UserFilterMemory::updateOrCreate(
            [
                'id_credential' => $data['id_credential'],
                'id_person'     => $data['id_person'],
                'route'         => $data['route'],
            ],
            [
                'full_url' => $data['full_url'],
            ]
        );

        return response()->json([
            'status' => true,
            'message' => 'Filtro salvo com sucesso.',
            'data' => $record,
        ]);
    }

    public function show(Request $request)
    {
        $record = UserFilterMemory::where('id_credential', $request->id_credential)
            ->where('id_person', $request->id_person)
            ->where('route', $request->route)
            ->first();

        return response()->json([
            'status' => true,
            'data' => $record,
        ]);
    }
}
