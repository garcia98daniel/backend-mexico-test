<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);


Route::group(["middleware" => "auth:sanctum"] , function () {
    Route::get('/reports', [SubjectController::class, 'index'])->middleware('can:subjects.index');
    Route::get('/subjects', [SubjectController::class, 'getSubjects']);

    Route::get('/users', [UserController::class, 'index'])->middleware('can:users.index');
    Route::post('/users/create', [UserController::class, 'store'])->middleware('can:users.create');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->middleware('can:users.delete');
    Route::get('/me', [UserController::class, 'profile'])->middleware('can:config.index');
    Route::patch('/me/edit', [UserController::class, 'updateProfile'])->middleware('can:config.edit');
});