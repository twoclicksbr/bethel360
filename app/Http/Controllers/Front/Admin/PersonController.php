<?php

namespace App\Http\Controllers\Front\Admin;

use App\Http\Controllers\Controller;
use App\Models\Api\Person;
use App\Models\Api\TypeGender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $token = session('authToken');

        $response = Http::withHeaders([
            'token' => $token,
        ])->get(env('APP_URL_API') . '/admin/person?page=' . $request->get('page', 1));

        // dd($response->json());

        $json = $response->json();

        $pagination = $json['data'] ?? [];
        $people     = $pagination['data'] ?? [];

        return view('admin.person.index', compact('people', 'pagination'));
    }

    public function create()
    {
        return view('admin.person.create', [
            'genders' => TypeGender::where('deleted', 0)
                ->where(function ($q) {
                    $q->where('id_credential', authIdCredential())
                        ->orWhere('id_credential', 1);
                })
                ->where('active', 1)
                ->orderBy('name')
                ->get()
        ]);
    }

    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'token' => session('authToken'),
        ])->post(env('APP_URL_API') . '/admin/person', [
            'name'       => $request->name,
            'birthdate'  => $request->birthdate,
            'id_gender'  => $request->id_gender,
            'active'     => $request->input('active', 1),
        ]);

        if ($response->successful()) {
            $id = $response->json()['data']['id'] ?? null;

            if ($id) {
                return redirect()->route('person.edit', base64_encode($id))->with('success', 'Pessoa criada com sucesso!');
            }

            return redirect()->route('person.index')->with('success', 'Pessoa criada com sucesso!');
        }

        return redirect()->back()->withErrors($response->json()['errors'] ?? ['Erro ao salvar']);
    }

    public function edit($encodedId)
    {
        $id = base64_decode($encodedId);
        $token = session('authToken');

        $response = Http::withHeaders([
            'token' => $token,
        ])->get(env('APP_URL_API') . "/admin/person/$id");

        $person = $response->json('data');

        if (empty($person['id'])) {
            abort(404, 'Pessoa não encontrada.');
        }

        return view('admin.person.edit', [
            'person' => $person,
            'genders' => TypeGender::where('deleted', 0)
                ->where(function ($q) {
                    $q->where('id_credential', authIdCredential())
                        ->orWhere('id_credential', 1);
                })
                ->where('active', 1)
                ->orderBy('name')
                ->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $response = Http::asForm()->withHeaders([
            'token' => session('authToken'),
        ])->post(env('APP_URL_API') . "/admin/person/$id?_method=PUT", [
            'name'      => $request->name,
            'birthdate' => $request->birthdate,
            'id_gender' => $request->id_gender,
            'active'    => $request->active,
        ]);

        $data = $response->json();

        if ($response->status() === 200 && ($data['status'] ?? false)) {
            if ($request->form_type === 'main') {
                return redirect()->route('person.index')
                    ->with('success', $data['message'] ?? 'Pessoa atualizada com sucesso!');
            }

            if ($request->form_type === 'status') {
                return redirect()->back()
                    ->with('success', $data['message'] ?? 'Status atualizado com sucesso!');
            }
        }

        return redirect()->back()
            ->withErrors(['Erro ao atualizar pessoa.']);
    }


    public function updateActive(Request $request, $encodedId)
    {
        $id = base64_decode($encodedId);

        $response = Http::asForm()->withHeaders([
            'token' => session('authToken'),
        ])->post(env('APP_URL_API') . "/admin/person/$id/active?_method=PUT", [
            'active' => $request->input('active', 1),
        ]);

        dd($response->body());

        $data = $response->json();

        if ($response->ok() && ($data['status'] ?? false)) {
            return redirect()->back()->with('success', $data['message'] ?? 'Status atualizado com sucesso!');
        }

        return redirect()->back()->withErrors(['Erro ao atualizar status da pessoa.']);
    }


    public function destroy($id)
    {
        $token = session('authToken');

        $response = Http::withHeaders([
            'token' => $token,
        ])->delete(env('APP_URL_API') . "/admin/person/{$id}");

        return redirect()->route('person.index');
    }

    public function restore($id)
    {
        $token = session('authToken');

        $response = Http::withHeaders([
            'token' => $token,
        ])->put(env('APP_URL_API') . "/admin/person/{$id}/restore");

        return redirect()->route('person.index');
    }
}
