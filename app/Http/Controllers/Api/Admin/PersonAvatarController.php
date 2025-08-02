<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PersonAvatarRequest;
use App\Models\Api\PersonAvatar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PersonAvatarController extends Controller
{
    public function store(PersonAvatarRequest $request, $id)
    {
        $idCredential = $request->get('authIdCredential');

        if (!$request->hasFile('avatar')) {
            return response()->json([
                'status' => false,
                'message' => 'Arquivo de avatar não encontrado.'
            ], 400);
        }

        $file = $request->file('avatar');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs("uploads/avatar/{$id}", $filename, 'public');

        $avatarUrl = asset("storage/{$path}");

        // Desativa anteriores
        PersonAvatar::where('id_person', $id)
            ->where('id_credential', $idCredential)
            ->update(['active' => 0]);

        // Novo registro
        $avatar = new PersonAvatar();
        $avatar->id_credential = $idCredential;
        $avatar->id_person     = $id;
        $avatar->avatar_url    = $avatarUrl;
        $avatar->active        = 1;
        $avatar->deleted       = 0;
        $avatar->save();

        logger('ID logado: ' . authIdPerson());
        logger('ID avatar enviado: ' . $id);

        // Atualiza a sessão se for o próprio usuário
        if (authIdPerson() == $id) {
            session(['authAvatarUrl' => $avatar->avatar_url]);
        }

        return response()->json([
            'status' => true,
            'avatar_url' => $avatar->avatar_url,
            'message' => 'Avatar enviado com sucesso.',
        ], 201);
    }


    public function show($id)
    {
        $avatar = PersonAvatar::where('id_person', $id)
            ->where('id_credential', authIdCredential())
            ->where('deleted', 0)
            ->where('active', 1)
            ->latest('created_at')
            ->first();

        if (!$avatar) {
            return response()->json([
                'status' => false,
                'message' => 'Avatar não encontrado.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'avatar_url' => $avatar->avatar_url,
        ]);
    }

    public function destroy($id)
    {
        $avatar = PersonAvatar::where('id_person', $id)
            ->where('id_credential', authIdCredential())
            ->where('deleted', 0)
            ->latest('created_at')
            ->first();

        if (!$avatar) {
            return response()->json(['status' => false, 'message' => 'Avatar não encontrado.'], 404);
        }

        // Remove o arquivo
        Storage::delete($avatar->avatar_url);

        // Marca como deletado
        $avatar->update(['deleted' => 1]);

        return response()->json(['status' => true, 'message' => 'Avatar removido com sucesso.']);
    }
}
