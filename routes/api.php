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

    Route::get('/users', [UserController::class, 'index'])->middleware('can:users.index');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->middleware('can:users.delete');

    // Route::get('/logout', [UserController::class, 'logout'])->middleware('can:users.index');
});