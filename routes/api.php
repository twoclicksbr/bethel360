<?php

use App\Http\Middleware\ApiAuthMiddleware;

use App\Http\Controllers\Api\Admin\AddressController;
use App\Http\Controllers\Api\Admin\CampusController;
use App\Http\Controllers\Api\Admin\ContactController;
use App\Http\Controllers\Api\Admin\DocumentController;
use App\Http\Controllers\Api\Admin\FileController;
use App\Http\Controllers\Api\Admin\LogOperationController;
use App\Http\Controllers\Api\Admin\MinistryCampusController;
use App\Http\Controllers\Api\Admin\MinistryController;
use App\Http\Controllers\Api\Admin\MinistryLeaderController;
use App\Http\Controllers\Api\Admin\NoteController;
use App\Http\Controllers\Api\Admin\TypeAddressController;
use App\Http\Controllers\Api\Admin\TypeContactController;
use App\Http\Controllers\Api\Admin\TypeDocumentController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Admin\PersonController;
use App\Http\Controllers\Api\Admin\PersonAvatarController;
use App\Http\Controllers\Api\Admin\ThemeCelebrationController;
use App\Http\Controllers\Api\Admin\ThemeCelebrationMinistryController;
use App\Http\Controllers\Api\Admin\ThemeCelebrationOccurrenceController;
use App\Http\Controllers\Api\Admin\ThemeCelebrationParticipationController;
use App\Http\Controllers\Api\Admin\ThemeGroupAttendanceController;
use App\Http\Controllers\Api\Admin\ThemeGroupController;
use App\Http\Controllers\Api\Admin\ThemeGroupLessonController;
use App\Http\Controllers\Api\Admin\ThemeGroupMaterialController;
use App\Http\Controllers\Api\Admin\ThemeGroupPersonController;
use App\Http\Controllers\Api\Admin\ThemeMinistryController;
use App\Http\Controllers\Api\Admin\TypeGenderController;
use App\Http\Controllers\Api\Admin\TypeGroupController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'login']);
Route::delete('/auth/logout', [AuthController::class, 'logout'])->middleware(ApiAuthMiddleware::class);


Route::prefix('admin')->middleware(ApiAuthMiddleware::class)->group(function () {

    // PERSON
    Route::prefix('person')->group(function () {
        Route::get('/', [PersonController::class, 'index']);
        Route::post('/', [PersonController::class, 'store']);
        Route::get('/{ids}', [PersonController::class, 'show']);
        Route::put('/batch-status', [PersonController::class, 'batchStatus']);
        Route::put('/{id}', [PersonController::class, 'update']);
        Route::delete('/{id}', [PersonController::class, 'destroy']);
        Route::get('/deleted', [PersonController::class, 'deleted']);

        Route::put('/{id}/active', [PersonController::class, 'updateActive']);

        Route::post('/{id}/restore', [PersonController::class, 'restore']);

        Route::post('/{id}/avatar', [PersonAvatarController::class, 'store']);
        Route::get('/{id}/avatar', [PersonAvatarController::class, 'show']);
        Route::delete('/{id}/avatar', [PersonAvatarController::class, 'destroy']);

        Route::post('/{id}/address', [AddressController::class, 'store'])->name('person.address.store');
    });

    // TYPE CONTACT
    Route::prefix('type-contact')->group(function () {
        Route::get('/', [TypeContactController::class, 'index']);
        Route::post('/', [TypeContactController::class, 'store']);
        Route::get('/{ids}', [TypeContactController::class, 'show']);
        Route::put('/{id}', [TypeContactController::class, 'update']);
        Route::delete('/{id}', [TypeContactController::class, 'destroy']);
        Route::get('/deleted', [TypeContactController::class, 'deleted']);
        Route::put('/restore/{id}', [TypeContactController::class, 'restore']);
    });

    // CONTACT
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index']);
        Route::post('/', [ContactController::class, 'store']);
        Route::get('/{ids}', [ContactController::class, 'show']);
        Route::put('/{id}', [ContactController::class, 'update']);
        Route::delete('/{id}', [ContactController::class, 'destroy']);
        Route::get('/deleted', [ContactController::class, 'deleted']);
        Route::put('/restore/{id}', [ContactController::class, 'restore']);
    });

    // TYPE ADDRESS
    Route::prefix('type-address')->group(function () {
        Route::get('/', [TypeAddressController::class, 'index']);
        Route::post('/', [TypeAddressController::class, 'store']);
        Route::get('/{ids}', [TypeAddressController::class, 'show']);
        Route::put('/{id}', [TypeAddressController::class, 'update']);
        Route::delete('/{id}', [TypeAddressController::class, 'destroy']);
        Route::get('/deleted', [TypeAddressController::class, 'deleted']);
        Route::put('/restore/{id}', [TypeAddressController::class, 'restore']);
    });

    // ADDRESS
    Route::prefix('address')->group(function () {
        Route::get('/', [AddressController::class, 'index']);
        Route::post('/', [AddressController::class, 'store']);
        Route::get('/{ids}', [AddressController::class, 'show']);
        Route::put('/{id}', [AddressController::class, 'update']);
        Route::delete('/{id}', [AddressController::class, 'destroy']);
        Route::get('/deleted', [AddressController::class, 'deleted']);
        Route::put('/restore/{id}', [AddressController::class, 'restore']);
    });

    // TYPE DOCUMENT
    Route::prefix('type-document')->group(function () {
        Route::get('/', [TypeDocumentController::class, 'index']);
        Route::post('/', [TypeDocumentController::class, 'store']);
        Route::get('/{ids}', [TypeDocumentController::class, 'show']);
        Route::put('/{id}', [TypeDocumentController::class, 'update']);
        Route::delete('/{id}', [TypeDocumentController::class, 'destroy']);
        Route::get('/deleted', [TypeDocumentController::class, 'deleted']);
        Route::put('/restore/{id}', [TypeDocumentController::class, 'restore']);
    });

    // DOCUMENT
    Route::prefix('document')->group(function () {
        Route::get('/', [DocumentController::class, 'index']);
        Route::post('/', [DocumentController::class, 'store']);
        Route::get('/{ids}', [DocumentController::class, 'show']);
        Route::put('/{id}', [DocumentController::class, 'update']);
        Route::delete('/{id}', [DocumentController::class, 'destroy']);
        Route::get('/deleted', [DocumentController::class, 'deleted']);
        Route::put('/restore/{id}', [DocumentController::class, 'restore']);
    });

    // FILE
    Route::prefix('file')->group(function () {
        Route::get('/', [FileController::class, 'index']);
        Route::post('/', [FileController::class, 'store']);
        Route::get('/{ids}', [FileController::class, 'show']);
        Route::put('/{id}', [FileController::class, 'update']);
        Route::delete('/{id}', [FileController::class, 'destroy']);
        Route::get('/deleted', [FileController::class, 'deleted']);
        Route::put('/restore/{id}', [FileController::class, 'restore']);
    });

    // NOTE
    Route::prefix('note')->group(function () {
        Route::get('/', [NoteController::class, 'index']);
        Route::post('/', [NoteController::class, 'store']);
        Route::get('/{ids}', [NoteController::class, 'show']);
        Route::put('/{id}', [NoteController::class, 'update']);
        Route::delete('/{id}', [NoteController::class, 'destroy']);
        Route::get('/deleted', [NoteController::class, 'deleted']);
        Route::put('/restore/{id}', [NoteController::class, 'restore']);
    });

    // CAMPUS
    Route::prefix('campus')->group(function () {
        Route::get('/', [CampusController::class, 'index']);
        Route::post('/', [CampusController::class, 'store']);
        Route::get('/{ids}', [CampusController::class, 'show']);
        Route::put('/{id}', [CampusController::class, 'update']);
        Route::delete('/{id}', [CampusController::class, 'destroy']);
        Route::get('/deleted', [CampusController::class, 'deleted']);
        Route::put('/restore/{id}', [CampusController::class, 'restore']);
    });

    // THEME MINISTRY
    Route::prefix('theme-ministry')->group(function () {
        Route::get('/', [ThemeMinistryController::class, 'index']);
        Route::post('/', [ThemeMinistryController::class, 'store']);
        Route::get('/{ids}', [ThemeMinistryController::class, 'show']);
        Route::put('/{id}', [ThemeMinistryController::class, 'update']);
        Route::delete('/{id}', [ThemeMinistryController::class, 'destroy']);
        Route::get('/deleted', [ThemeMinistryController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeMinistryController::class, 'restore']);
    });

    // MINISTRY
    Route::prefix('ministry')->group(function () {
        Route::get('/', [MinistryController::class, 'index']);
        Route::post('/', [MinistryController::class, 'store']);
        Route::get('/{ids}', [MinistryController::class, 'show']);
        Route::put('/{id}', [MinistryController::class, 'update']);
        Route::delete('/{id}', [MinistryController::class, 'destroy']);
        Route::get('/deleted', [MinistryController::class, 'deleted']);
        Route::put('/restore/{id}', [MinistryController::class, 'restore']);
    });

    // MINISTRY CAMPUS
    Route::prefix('ministry-campus')->group(function () {
        Route::get('/', [MinistryCampusController::class, 'index']);
        Route::post('/', [MinistryCampusController::class, 'store']);
        Route::get('/{ids}', [MinistryCampusController::class, 'show']);
        Route::put('/{id}', [MinistryCampusController::class, 'update']);
        Route::delete('/{id}', [MinistryCampusController::class, 'destroy']);
        Route::get('/deleted', [MinistryCampusController::class, 'deleted']);
        Route::put('/restore/{id}', [MinistryCampusController::class, 'restore']);
    });

    // MINISTRY LEADER
    Route::prefix('ministry-leader')->group(function () {
        Route::get('/', [MinistryLeaderController::class, 'index']);
        Route::post('/', [MinistryLeaderController::class, 'store']);
        Route::get('/{ids}', [MinistryLeaderController::class, 'show']);
        Route::put('/{id}', [MinistryLeaderController::class, 'update']);
        Route::delete('/{id}', [MinistryLeaderController::class, 'destroy']);
        Route::get('/deleted', [MinistryLeaderController::class, 'deleted']);
        Route::put('/restore/{id}', [MinistryLeaderController::class, 'restore']);
    });

    // THEME CELEBRATION
    Route::prefix('theme-celebration')->group(function () {
        Route::get('/', [ThemeCelebrationController::class, 'index']);
        Route::post('/', [ThemeCelebrationController::class, 'store']);
        Route::get('/{ids}', [ThemeCelebrationController::class, 'show']);
        Route::put('/{id}', [ThemeCelebrationController::class, 'update']);
        Route::delete('/{id}', [ThemeCelebrationController::class, 'destroy']);
        Route::get('/deleted', [ThemeCelebrationController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeCelebrationController::class, 'restore']);
    });

    // THEME CELEBRATION OCCURRENCE
    Route::prefix('theme-celebration-occurrence')->group(function () {
        Route::get('/', [ThemeCelebrationOccurrenceController::class, 'index']);
        Route::post('/', [ThemeCelebrationOccurrenceController::class, 'store']);
        Route::get('/{ids}', [ThemeCelebrationOccurrenceController::class, 'show']);
        Route::put('/{id}', [ThemeCelebrationOccurrenceController::class, 'update']);
        Route::delete('/{id}', [ThemeCelebrationOccurrenceController::class, 'destroy']);
        Route::get('/deleted', [ThemeCelebrationOccurrenceController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeCelebrationOccurrenceController::class, 'restore']);
    });

    // THEME CELEBRATION MINISTRY
    Route::prefix('theme-celebration-ministry')->group(function () {
        Route::get('/', [ThemeCelebrationMinistryController::class, 'index']);
        Route::post('/', [ThemeCelebrationMinistryController::class, 'store']);
        Route::get('/{ids}', [ThemeCelebrationMinistryController::class, 'show']);
        Route::put('/{id}', [ThemeCelebrationMinistryController::class, 'update']);
        Route::delete('/{id}', [ThemeCelebrationMinistryController::class, 'destroy']);
        Route::get('/deleted', [ThemeCelebrationMinistryController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeCelebrationMinistryController::class, 'restore']);
    });

    // THEME CELEBRATION PARTICIPATION
    Route::prefix('theme-celebration-participation')->group(function () {
        Route::get('/', [ThemeCelebrationParticipationController::class, 'index']);
        Route::post('/', [ThemeCelebrationParticipationController::class, 'store']);
        Route::get('/{ids}', [ThemeCelebrationParticipationController::class, 'show']);
        Route::put('/{id}', [ThemeCelebrationParticipationController::class, 'update']);
        Route::delete('/{id}', [ThemeCelebrationParticipationController::class, 'destroy']);
        Route::get('/deleted', [ThemeCelebrationParticipationController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeCelebrationParticipationController::class, 'restore']);
    });

    // THEME GROUP
    Route::prefix('theme-group')->group(function () {
        Route::get('/', [ThemeGroupController::class, 'index']);
        Route::post('/', [ThemeGroupController::class, 'store']);
        Route::get('/{ids}', [ThemeGroupController::class, 'show']);
        Route::put('/{id}', [ThemeGroupController::class, 'update']);
        Route::delete('/{id}', [ThemeGroupController::class, 'destroy']);
        Route::get('/deleted', [ThemeGroupController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeGroupController::class, 'restore']);
    });

    // TYPE GENDER
    Route::prefix('type-gender')->group(function () {
        Route::get('/', [TypeGenderController::class, 'index']);
        Route::post('/', [TypeGenderController::class, 'store']);
        Route::get('/{ids}', [TypeGenderController::class, 'show']);
        Route::put('/{id}', [TypeGenderController::class, 'update']);
        Route::delete('/{id}', [TypeGenderController::class, 'destroy']);
        Route::get('/deleted', [TypeGenderController::class, 'deleted']);
        Route::put('/restore/{id}', [TypeGenderController::class, 'restore']);
    });

    // TYPE GROUP
    Route::prefix('type-group')->group(function () {
        Route::get('/', [TypeGroupController::class, 'index']);
        Route::post('/', [TypeGroupController::class, 'store']);
        Route::get('/{ids}', [TypeGroupController::class, 'show']);
        Route::put('/{id}', [TypeGroupController::class, 'update']);
        Route::delete('/{id}', [TypeGroupController::class, 'destroy']);
        Route::get('/deleted', [TypeGroupController::class, 'deleted']);
        Route::put('/restore/{id}', [TypeGroupController::class, 'restore']);
    });

    // THEME GROUP PERSON
    Route::prefix('theme-group-person')->group(function () {
        Route::get('/', [ThemeGroupPersonController::class, 'index']);
        Route::post('/', [ThemeGroupPersonController::class, 'store']);
        Route::get('/{ids}', [ThemeGroupPersonController::class, 'show']);
        Route::put('/{id}', [ThemeGroupPersonController::class, 'update']);
        Route::delete('/{id}', [ThemeGroupPersonController::class, 'destroy']);
        Route::get('/deleted', [ThemeGroupPersonController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeGroupPersonController::class, 'restore']);
    });

    // THEME GROUP LESSON
    Route::prefix('theme-group-lesson')->group(function () {
        Route::get('/', [ThemeGroupLessonController::class, 'index']);
        Route::post('/', [ThemeGroupLessonController::class, 'store']);
        Route::get('/{ids}', [ThemeGroupLessonController::class, 'show']);
        Route::put('/{id}', [ThemeGroupLessonController::class, 'update']);
        Route::delete('/{id}', [ThemeGroupLessonController::class, 'destroy']);
        Route::get('/deleted', [ThemeGroupLessonController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeGroupLessonController::class, 'restore']);
    });

    // THEME GROUP ATTENDANCE
    Route::prefix('theme-group-attendance')->group(function () {
        Route::get('/', [ThemeGroupAttendanceController::class, 'index']);
        Route::post('/', [ThemeGroupAttendanceController::class, 'store']);
        Route::get('/{ids}', [ThemeGroupAttendanceController::class, 'show']);
        Route::put('/{id}', [ThemeGroupAttendanceController::class, 'update']);
        Route::delete('/{id}', [ThemeGroupAttendanceController::class, 'destroy']);
        Route::get('/deleted', [ThemeGroupAttendanceController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeGroupAttendanceController::class, 'restore']);
    });

    // THEME GROUP MATERIAL
    Route::prefix('theme-group-material')->group(function () {
        Route::get('/', [ThemeGroupMaterialController::class, 'index']);
        Route::post('/', [ThemeGroupMaterialController::class, 'store']);
        Route::get('/{ids}', [ThemeGroupMaterialController::class, 'show']);
        Route::put('/{id}', [ThemeGroupMaterialController::class, 'update']);
        Route::delete('/{id}', [ThemeGroupMaterialController::class, 'destroy']);
        Route::get('/deleted', [ThemeGroupMaterialController::class, 'deleted']);
        Route::put('/restore/{id}', [ThemeGroupMaterialController::class, 'restore']);
    });









    // LOG OPERATION
    Route::prefix('log-operation')->group(function () {
        Route::get('/', [LogOperationController::class, 'index']);
        Route::get('/deleted', [LogOperationController::class, 'deleted']);
        Route::get('/{ids}', [LogOperationController::class, 'show']);
        Route::post('/', [LogOperationController::class, 'store']);
        Route::put('/{id}', [LogOperationController::class, 'update']);
        Route::delete('/{id}', [LogOperationController::class, 'destroy']);
        Route::put('/{id}/restore', [LogOperationController::class, 'restore']);
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
