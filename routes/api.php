<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KreatorController;
use App\Http\Controllers\AudiensController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Rute untuk AudiensController
Route::prefix('audiens')->group(function () {
    Route::put('/{idAudiens}/edit-profile', [AudiensController::class, 'editProfile']);
    Route::get('/{idAudiens}/show-profile', [AudiensController::class, 'showProfile']);
    Route::post('/buy-content', [AudiensController::class, 'buyContent']);
    Route::get('/watch-content', [AudiensController::class, 'watchContent']);
});

// Rute untuk AuthAPIController
Route::post('/audiens/register', 'App\Http\Controllers\AuthApiController@register');
Route::post('/audiens/login', 'App\Http\Controllers\AuthApiController@login');
Route::post('/audiens/logout', 'App\Http\Controllers\AuthApiController@logout')->middleware('auth:api');


// Rute untuk KreatorController
Route::put('/kreator/{idKreator}/edit-profile', [KreatorController::class, 'editProfile']);
Route::post('/kreator/{idKreator}/upload-cv', [KreatorController::class, 'uploadCV']);
Route::get('/kreator/{idKreator}/show-profile', [KreatorController::class, 'showProfile']);

// Route untuk kontenController
Route::post('/create-content', [KontenController::class, 'createContent']);
Route::put('/update-content/{id}', [KontenController::class, 'updateContent']);
Route::delete('/delete-content/{id}', [KontenController::class, 'deleteContent']);
Route::get('/show-content/{id}', [KontenController::class, 'showContent']);
Route::get('/show-all-content', [KontenController::class, 'showAllContent']);

