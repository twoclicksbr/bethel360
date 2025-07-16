<?php

use App\Http\Controllers\Api\Admin\AddressController;
use App\Http\Controllers\Api\Admin\CampusController;
use App\Http\Controllers\Api\Admin\ContactController;
use App\Http\Controllers\Api\Admin\DocumentController;
use App\Http\Controllers\Api\Admin\FileController;
use App\Http\Controllers\Api\Admin\MinistryCampusController;
use App\Http\Controllers\Api\Admin\MinistryController;
use App\Http\Controllers\Api\Admin\NoteController;
use App\Http\Controllers\Api\Admin\TypeAddressController;
use App\Http\Controllers\Api\Admin\TypeContactController;
use App\Http\Controllers\Api\Admin\TypeDocumentController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Admin\PersonController;
use App\Http\Controllers\Api\Admin\ThemeMinistryController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\ApiAuthMiddleware;

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::prefix('admin')->middleware(ApiAuthMiddleware::class)->group(function () {

    // PERSON
    Route::prefix('person')->group(function () {
        Route::get('/', [PersonController::class, 'index']);
        Route::post('/', [PersonController::class, 'store']);
        Route::get('/{id}', [PersonController::class, 'show']);
        Route::put('/{id}', [PersonController::class, 'update']);
        Route::delete('/{id}', [PersonController::class, 'destroy']);
        Route::get('/deleted', [PersonController::class, 'deleted']);
    });

    // TYPE CONTACT
    Route::prefix('type-contact')->group(function () {
        Route::get('/', [TypeContactController::class, 'index']);
        Route::post('/', [TypeContactController::class, 'store']);
        Route::get('/{id}', [TypeContactController::class, 'show']);
        Route::put('/{id}', [TypeContactController::class, 'update']);
        Route::delete('/{id}', [TypeContactController::class, 'destroy']);
        Route::get('/deleted', [TypeContactController::class, 'deleted']);
        Route::put('/restore/{id}', [TypeContactController::class, 'restore']);
    });

    // CONTACT
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index']);
        Route::post('/', [ContactController::class, 'store']);
        Route::get('/{id}', [ContactController::class, 'show']);
        Route::put('/{id}', [ContactController::class, 'update']);
        Route::delete('/{id}', [ContactController::class, 'destroy']);
        Route::get('/deleted', [ContactController::class, 'deleted']);
        Route::put('/restore/{id}', [ContactController::class, 'restore']);
    });

    // TYPE ADDRESS
    Route::prefix('type-address')->group(function () {
        Route::get('/', [TypeAddressController::class, 'index']);
        Route::post('/', [TypeAddressController::class, 'store']);
        Route::get('/{id}', [TypeAddressController::class, 'show']);
        Route::put('/{id}', [TypeAddressController::class, 'update']);
        Route::delete('/{id}', [TypeAddressController::class, 'destroy']);
        Route::get('/deleted', [TypeAddressController::class, 'deleted']);
        Route::put('/restore/{id}', [TypeAddressController::class, 'restore']);
    });

    // ADDRESS
    Route::prefix('address')->group(function () {
        Route::get('/', [AddressController::class, 'index']);
        Route::post('/', [AddressController::class, 'store']);
        Route::get('/{id}', [AddressController::class, 'show']);
        Route::put('/{id}', [AddressController::class, 'update']);
        Route::delete('/{id}', [AddressController::class, 'destroy']);
        Route::get('/deleted', [AddressController::class, 'deleted']);
        Route::put('/restore/{id}', [AddressController::class, 'restore']);
    });

    // TYPE DOCUMENT
    Route::prefix('type-document')->group(function () {
        Route::get('/', [TypeDocumentController::class, 'index']);
        Route::post('/', [TypeDocumentController::class, 'store']);
        Route::get('/{id}', [TypeDocumentController::class, 'show']);
        Route::put('/{id}', [TypeDocumentController::class, 'update']);
        Route::delete('/{id}', [TypeDocumentController::class, 'destroy']);
        Route::get('/deleted', [TypeDocumentController::class, 'deleted']);
        Route::put('/restore/{id}', [TypeDocumentController::class, 'restore']);
    });

    // DOCUMENT
    Route::prefix('document')->group(function () {
        Route::get('/', [DocumentController::class, 'index']);
        Route::post('/', [DocumentController::class, 'store']);
        Route::get('/{id}', [DocumentController::class, 'show']);
        Route::put('/{id}', [DocumentController::class, 'update']);
        Route::delete('/{id}', [DocumentController::class, 'destroy']);
        Route::get('/deleted', [DocumentController::class, 'deleted']);
        Route::put('/restore/{id}', [DocumentController::class, 'restore']);
    });

    // FILE
    Route::prefix('file')->group(function () {
        Route::get('/', [FileController::class, 'index']);
        Route::post('/', [FileController::class, 'store']);
        Route::get('/{id}', [FileController::class, 'show']);
        Route::put('/{id}', [FileController::class, 'update']);
        Route::delete('/{id}', [FileController::class, 'destroy']);
        Route::get('/deleted', [FileController::class, 'deleted']);
        Route::put('/restore/{id}', [FileController::class, 'restore']);
    });

    // NOTE
    Route::prefix('note')->group(function () {
        Route::get('/', [NoteController::class, 'index']);
        Route::post('/', [NoteController::class, 'store']);
        Route::get('/{id}', [NoteController::class, 'show']);
        Route::put('/{id}', [NoteController::class, 'update']);
        Route::delete('/{id}', [NoteController::class, 'destroy']);
        Route::get('/deleted', [NoteController::class, 'deleted']);
        Route::put('/restore/{id}', [NoteController::class, 'restore']);
    });

    // CAMPUS
    Route::prefix('campus')->group(function () {
        Route::get('/', [CampusController::class, 'index']);
        Route::post('/', [CampusController::class, 'store']);
        Route::get('/{id}', [CampusController::class, 'show']);
        Route::put('/{id}', [CampusController::class, 'update']);
        Route::delete('/{id}', [CampusController::class, 'destroy']);
        Route::get('/deleted', [CampusController::class, 'deleted']);
        Route::put('/restore/{id}', [CampusController::class, 'restore']);
    });

    // THEME MINISTRY
    Route::prefix('theme-ministry')->group(function () {
        Route::get('/', [ThemeMinistryController::class, 'index']);
        Route::post('/', [ThemeMinistryController::class, 'store']);
        Route::get('/{id}', [ThemeMinistryController::class, 'show']);
        Route::put('/{id}', [ThemeMinistryController::class, 'update']);
        Route::delete('/{id}', [ThemeMinistryController::class, 'destroy']);
        Route::get('/deleted', [ThemeMinistryController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeMinistryController::class, 'restore']);
    });

    // MINISTRY
    Route::prefix('ministry')->group(function () {
        Route::get('/', [MinistryController::class, 'index']);
        Route::post('/', [MinistryController::class, 'store']);
        Route::get('/{id}', [MinistryController::class, 'show']);
        Route::put('/{id}', [MinistryController::class, 'update']);
        Route::delete('/{id}', [MinistryController::class, 'destroy']);
        Route::get('/deleted', [MinistryController::class, 'deleted']);
        Route::put('/restore/{id}', [MinistryController::class, 'restore']);
    });

    // MINISTRY CAMPUS
    Route::prefix('ministry-campus')->group(function () {
        Route::get('/', [MinistryCampusController::class, 'index']);
        Route::post('/', [MinistryCampusController::class, 'store']);
        Route::delete('/{id}', [MinistryCampusController::class, 'destroy']);
    });




    Route::put('{module}', function ($module) {
        return response()->json([
            'status' => 422,
            'message' => "Código do registro da tabela [{$module}] não informado na URL."
        ], 422);
    });
});

Route::fallback(function () {
    return response()->json([
        'status' => 404,
        'error' => 'Rota ou metodo invalido.'
    ], 404);
});
