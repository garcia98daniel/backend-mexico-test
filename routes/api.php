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

Route::post('/login', [AuthController::class, 'login']);


Route::group(["middleware" => "auth:sanctum"] , function () {
    //------------------------- get the subjects with their students -----------------------//
    Route::get('/reports', [SubjectController::class, 'index'])->middleware('can:subjects.index');

    //-------------------------------- get only the subjects -------------------------------//
    Route::get('/subjects', [SubjectController::class, 'getSubjects']);

    //-------------------------- get users with their permissions --------------------------//
    Route::get('/users', [UserController::class, 'index'])->middleware('can:users.index');

    //---------------------------------- create an user -------------------------------------//
    Route::post('/users/create', [UserController::class, 'store'])->middleware('can:users.create');

    //---------------------------------- delete an user -------------------------------------//
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->middleware('can:users.delete');

    //------------------------------ get authenticate user info -----------------------------//
    Route::get('/me', [UserController::class, 'profile'])->middleware('can:config.index');

    //---------------------------------- delete an user -------------------------------------//
    Route::patch('/me/edit', [UserController::class, 'updateProfile'])->middleware('can:config.edit');
});