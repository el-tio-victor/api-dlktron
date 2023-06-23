<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccionesCrudController;

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

Route::get('/users', [AccionesCrudController::class,'index']);

Route::resource('/acciones-crud', AccionesCrudController::class);
Route::resource('/modulos',App\Http\Controllers\ModulosController::class);
Route::resource("/roles", \App\Http\Controllers\RolesController::class);


Route::resource("/rol-permiso-modulo", \App\Http\Controllers\AccioncrudRolModuloController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
