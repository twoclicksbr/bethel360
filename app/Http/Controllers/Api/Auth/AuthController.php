<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\Api\LoginRequest;
use App\Models\Api\PersonUser;
use App\Models\Api\Credential;
use App\Models\Api\Token;
use Illuminate\Support\Str;

use App\Models\Api\LogAccess;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        // 1. Busca person_user com email
        $personUser = PersonUser::where('email', $request->email)
            ->where('active', 1)
            ->where('deleted', 0)
            ->first();

        if (!$personUser || !Hash::check($request->password, $personUser->password)) {
            return response()->json([
                'status' => 401,
                'error' => 'Credenciais inválidas'
            ], 401);
        }

        // 2. Verifica credential
        $credential = Credential::where('id', $personUser->id_credential)
            ->where('active', 1)
            ->where('deleted', 0)
            ->first();

        if (!$credential) {
            return response()->json([
                'status' => 401,
                'error' => 'Credencial inativa ou inexistente'
            ], 401);
        }

        // 3. Apaga TODOS os tokens vencidos (independente de quem seja)
        Token::where('expires_at', '<', now())->delete();

        // 4. Apaga tokens da mesma id_credential + id_person (mesmo que ainda estejam válidos)
        Token::where('id_credential', $personUser->id_credential)
            ->where('id_person', $personUser->id_person)
            ->delete();

        // 5. Cria novo token
        $token = Token::create([
            'id_credential' => $personUser->id_credential,
            'id_person' => $personUser->id_person,
            'token' => Str::random(64),
            'expires_at' => now()->addHours(24),
        ]);

        LogAccess::create([
            'id_credential' => $credential->id,
            'id_person' => $personUser->person->id ?? null,
            'action' => 'login',
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        // 6. Resposta
        return response()->json([
            'authIdCredential' => $personUser->id_credential,
            'authIdPerson' => $personUser->id_person,
            'authNamePerson' => $personUser->person->name ?? '',
            'authNameFirst' => strtok($personUser->person->name ?? '', ' '),
            'authEmailPersonUser' => $personUser->email,
            'authToken' => $token->token,
        ]);
    }

    public function logout(Request $request)
    {
        $tokenValue = $request->header('token');

        if (!$tokenValue) {
            return response()->json([
                'status' => 401,
                'error' => 'Token não informado.'
            ], 401);
        }

        LogAccess::create([
            'id_credential' => authIdCredential(),
            'id_person' => authIdPerson(),
            'action' => 'logout',
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $deleted = Token::where('token', $tokenValue)->delete();

        if ($deleted) {
            return response()->json([
                'message' => 'Logout realizado com sucesso.'
            ]);
        }

        return response()->json([
            'status' => 401,
            'error' => 'Token inválido.'
        ], 401);
    }
}
