<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('authToken')) {
            session()->flash('error', true);
            session()->flash('error_title', 'Sessão expirada.');
            session()->flash('error_message', 'Por segurança, sua sessão foi encerrada. Faça login novamente para continuar.');

            return redirect('/auth/login');
        }

        return $next($request);
    }
}
