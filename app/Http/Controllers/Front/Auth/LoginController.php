<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Front\Auth\LoginRequest;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $response = Http::post(config('app.url_api') . '/auth/login', [
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if ($response->status() === 401) {
            return back()->withErrors([
                'email' => 'Credenciais inválidas.'
            ])->withInput();
        }

        if (! $response->successful()) {
            return back()->withErrors([
                'email' => 'Erro de comunicação com o servidor.'
            ])->withInput();
        }

        $data = $response->json();

        session([
            'authToken'           => $data['authToken'],
            'authIdCredential'    => $data['authIdCredential'],
            'authIdPerson'        => $data['authIdPerson'],
            'authNamePerson'      => $data['authNamePerson'],
            'authNameFirst'       => $data['authNameFirst'],
            'authIdGender'        => $data['authIdGender'],
            'authNameGender'      => $data['authNameGender'],
            'authEmailPersonUser' => $data['authEmailPersonUser'],
            'authAvatarUrl'       => $data['authAvatarUrl'] ?? null,

        ]);

        // dd(session('authAvatarUrl'));

        return redirect('/admin/dashboard');
    }

    public function logout(Request $request)
    {
        session()->flush();

        return redirect('/auth/login')->with([
            'logout' => false,
            'error_title' => 'Logout realizado',
            'error_message' => 'Você saiu do sistema com sucesso.',
        ]);
    }
}
