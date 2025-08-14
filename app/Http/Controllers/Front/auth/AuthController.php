<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $response = Http::post(env('APP_URL_API') . '/auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        try {
            $data = $response->json();
        } catch (\Throwable $e) {
            return redirect()->to('/auth/login')
                ->withErrors(['email' => 'A resposta do servidor não é válida.'])
                ->withInput();
        }

        if (!is_array($data)) {
            return redirect()->to('/auth/login')
                ->withErrors(['email' => 'A resposta da API está corrompida.'])
                ->withInput();
        }

        if (isset($data['errors']['password'])) {
            return redirect()->to('/auth/login')
                ->withErrors(['email' => $data['errors']['password'][0]])
                ->withInput();
        }

        if ($response->status() === 401 || isset($data['error'])) {
            return redirect()->to('/auth/login')
                ->withErrors(['email' => $data['error'] ?? 'E-mail ou senha incorretos.'])
                ->withInput();
        }

        if (
            empty($data['authToken']) ||
            empty($data['authIdCredential']) ||
            empty($data['authIdPerson'])
        ) {
            return redirect()->to('/auth/login')
                ->withErrors(['email' => 'Resposta incompleta. Contate o suporte.'])
                ->withInput();
        }

        session([
            'authToken'           => $data['authToken'],
            'authIdCredential'    => $data['authIdCredential'],
            'authIdPerson'        => $data['authIdPerson'],
            'authNamePerson'      => $data['authNamePerson'],
            'authNameFirst'       => $data['authNameFirst'],
            'authIdGender'        => $data['authIdGender'],
            'authNameGender'      => $data['authNameGender'],
            'authEmail'           => $data['authEmailPersonUser'],
        ]);

        return redirect('/admin/dashboard');
    }
}
