<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Front\LoginRequest;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $response = Http::post(env('APP_URL_API') . '/auth/login', [
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            session([
                'auth_token'          => $data['token'],
                'authIdCredential'    => $data['authIdCredential'],
                'authIdPerson'        => $data['authIdPerson'],
                'authNamePerson'      => $data['authNamePerson'],
                'authNameFirst'       => $data['authNameFirst'],
                'authEmailPersonUser' => $data['authEmailPersonUser'],
            ]);

            return redirect('/sys/dashboard');
        }

        return back()->withErrors([
            'email' => $response->json('message') ?? 'Credenciais inválidas.'
        ])->withInput();
    }
}
