<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TesteController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'message' => 'Acesso autenticado com sucesso!',
            'authIdCredential' => $request->authIdCredential,
            'authIdPerson' => $request->authIdPerson,
        ]);
    }
}
