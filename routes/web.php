<?php

use App\Http\Controllers\Front\Admin\PersonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Auth\LoginController;
use App\Http\Controllers\Front\Admin\DashboardController;



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

    Route::get('/person', [PersonController::class, 'index'])->name('person.index');
    Route::get('/person/create', [PersonController::class, 'create'])->name('person.create');
    Route::get('/person/edit/{encodedId}', [PersonController::class, 'edit'])->name('person.edit');

    Route::post('/person', [PersonController::class, 'store'])->name('person.store');
    Route::put('/person/{id}', [PersonController::class, 'update'])->name('person.update');
    Route::delete('/person/{id}', [PersonController::class, 'destroy'])->name('person.destroy');
    Route::put('/person/{id}/restore', [PersonController::class, 'restore'])->name('person.restore');

    Route::put('/person/{id}/active', [PersonController::class, 'update'])->name('person.updateActive');

    Route::get('/person/avatar/refresh', function () {
        $avatar = \App\Models\Api\PersonAvatar::where('id_person', session('authIdPerson'))
            ->where('active', 1)
            ->where('deleted', 0)
            ->latest()
            ->first();

        if ($avatar) {
            session(['authAvatarUrl' => $avatar->avatar_url]);
        } else {
            session()->forget('authAvatarUrl'); // 👈 limpa avatar se não houver mais ativo
        }

        return response()->json(['status' => true]);
    });
});
