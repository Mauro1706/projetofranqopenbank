<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [\App\Http\Controllers\PropertyController::class, "index"]);
Route::get("/moeda", [\App\Http\Controllers\PropertyController::class, "moeda"]);
Route::get("/bolsa", [\App\Http\Controllers\PropertyController::class, "bolsa"]);
Route::get('/login', [\App\Http\Controllers\LoginController::class, "index"]);
Route::put("/logar", [\App\Http\Controllers\LoginController::class, "login"]);
Route::get("/logout", [\App\Http\Controllers\LoginController::class, "logout"]);
Route::get("/register", [\App\Http\Controllers\LoginController::class, "register"]);
Route::put("/gravarUsuario", [\App\Http\Controllers\LoginController::class, "gravarUsuario"]);
