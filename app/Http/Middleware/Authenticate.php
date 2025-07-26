<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('authToken')) {
            return Redirect::to('/auth/login');
        }

        return $next($request);
    }
}
