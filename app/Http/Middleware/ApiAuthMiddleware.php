<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Api\Token;
use Carbon\Carbon;

class ApiAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pega o token do header
        $tokenValue = $request->header('token');

        // Se não tiver token, retorna erro
        if (!$tokenValue) {
            return response()->json([
                'status' => 401,
                'error' => 'Token nao informado.'
            ], 401);
        }

        // Busca token válido no banco
        $token = Token::where('token', $tokenValue)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        // Se token não for encontrado ou expirado
        if (!$token) {
            return response()->json([
                'status' => 401,
                'error' => 'Token invalido ou expirado.'
            ], 401);
        }

        // Define dados de auth para uso posterior
        $request->merge([
            'authIdCredential' => $token->id_credential,
            'authIdPerson'     => $token->id_person,
        ]);

        // Libera acesso
        return $next($request);
    }
}
