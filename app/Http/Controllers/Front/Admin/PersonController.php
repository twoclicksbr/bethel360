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

        // Captura filtros
        $query = $request->query();
        $query['sort'] = $request->get('sort', 'name');
        $query['direction'] = $request->get('direction', 'asc');

        // Lista de pessoas
        $response = Http::withHeaders([
            'token' => $token,
        ])->get(env('APP_URL_API') . '/admin/person', $query);

        $json = $response->json();
        $pagination = $json['data'] ?? [];
        $people = $pagination['data'] ?? [];

        // Lista de avatars
        $avatarList = \App\Models\Api\PersonAvatar::select('id_person', 'avatar_url')
            ->whereIn('id_person', array_column($people, 'id'))
            ->where(function ($q) {
                $q->where('id_credential', authIdCredential())
                    ->orWhere('id_credential', 1);
            })
            ->where('active', 1)
            ->where('deleted', 0)
            ->latest('created_at')
            ->get()
            ->keyBy('id_person');

        // Vincula avatar a cada pessoa (usando array_map para manter os dados)
        $people = array_map(function ($person) use ($avatarList) {
            $person['avatar_url'] = $avatarList[$person['id']]->avatar_url ?? null;
            return $person;
        }, $people);

        // Gêneros
        $genders = TypeGender::where('deleted', 0)
            ->where(function ($q) {
                $q->where('id_credential', authIdCredential())
                    ->orWhere('id_credential', 1);
            })
            ->where('active', 1)
            ->orderBy('name')
            ->get();

        return view('admin.person.index', compact('people', 'pagination', 'genders'));
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

        // Busca a pessoa
        $response = Http::withHeaders([
            'token' => $token,
        ])->get(env('APP_URL_API') . "/admin/person/$id");

        $person = $response->json('data');

        if (empty($person['id'])) {
            abort(404, 'Pessoa não encontrada.');
        }

        // Busca o avatar via API
        $avatarResponse = Http::withHeaders([
            'token' => $token,
        ])->get(env('APP_URL_API') . "/admin/person/$id/avatar");

        $avatarData = $avatarResponse->json();

        if ($avatarResponse->ok() && isset($avatarData['avatar_url'])) {
            $person['avatar_url'] = $avatarData['avatar_url'];
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
