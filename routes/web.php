<?php

use App\Http\Controllers\Api\Admin\AddressController;
use App\Http\Controllers\Front\Admin\PersonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Auth\LoginController;
use App\Http\Controllers\Front\Admin\DashboardController;
use App\Models\Api\PersonAvatar;

Route::get('/', function () {
    return view('site');
});

Route::get('/auth/login', [LoginController::class, 'showForm']);
Route::post('/auth/login', [LoginController::class, 'login'])->name('auth.login.post');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/logout', function () {
//     session()->flush(); // limpa sessão
//     return redirect('/auth/login');
// });

Route::middleware(['web', 'session_auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');







    Route::prefix('person')->group(function () {

        // Grid e impressão
        Route::get('/', [PersonController::class, 'index'])->name('person.index');
        Route::get('/print', [PersonController::class, 'print'])->name('person.print');

        // Criar nova pessoa
        Route::get('/create', [PersonController::class, 'create'])->name('person.create');
        Route::post('/', [PersonController::class, 'store'])->name('person.store');

        // Editar pessoa (com abas e endereço opcional)
        Route::get('/edit/{encodedId}/{tab?}/{encodedAddress?}', [PersonController::class, 'edit'])->name('person.edit');
        Route::put('/{encodedId}', [PersonController::class, 'update'])->name('person.update');

        // Ativar/Inativar
        Route::put('/{encodedId}/active', [PersonController::class, 'updateActive'])->name('person.update.active');

        // Excluir e restaurar
        Route::delete('/{encodedId}', [PersonController::class, 'destroy'])->name('person.destroy');
        Route::put('/{encodedId}/restore', [PersonController::class, 'restore'])->name('person.restore');

        // Endereços (formulário, store e update)
        Route::get('/edit/{encodedId}/address', [PersonController::class, 'formAddress'])->name('person.address.create');
        Route::get('/edit/{encodedId}/address/{encodedAddress}', [PersonController::class, 'formAddress'])->name('person.address.edit');
        Route::post('/{encodedId}/address', [PersonController::class, 'storeAddress'])->name('person.address.store');
        Route::put('/edit/{encodedId}/address/{encodedAddress}', [PersonController::class, 'updateAddress'])->name('person.address.update');

        // Documentos (formulário, store e update)
        // web.php




        Route::get('/edit/{encodedId}/document', [PersonController::class, 'formDocument'])->name('person.document.create');
        Route::get('/edit/{encodedId}/document/{encodedDocument}', [PersonController::class, 'formDocument'])->name('person.document.edit');
        Route::get('/edit/{encodedId}/{tab?}/{encodedAddress?}', [PersonController::class, 'edit'])->name('person.edit');
        Route::post('/{encodedId}/document', [PersonController::class, 'storeDocument'])->name('person.document.store');
        Route::put('/edit/{encodedId}/document/{encodedDocument}', [PersonController::class, 'updateDocument'])->name('person.document.update');

        Route::delete('/document/{encodedId}', [PersonController::class, 'destroyDocument'])->name('person.document.destroy');



        // Atualiza avatar da sessão
        Route::get('/avatar/refresh', function () {
            $avatar = PersonAvatar::where('id_person', session('authIdPerson'))
                ->where('active', 1)
                ->where('deleted', 0)
                ->latest()
                ->first();

            if ($avatar) {
                session(['authAvatarUrl' => $avatar->avatar_url]);
            } else {
                session()->forget('authAvatarUrl');
            }

            return response()->json(['status' => true]);
        });
    });
});
