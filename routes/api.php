<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return response()->json(["msg" => "No tienes permisos!!!"], 401);
}) -> name("unauthorized");

Route::post("/register", [AuthController::class, "Register"])     -> name("register");
Route::get("/validate", [AuthController::class, "ValidarToken"])  -> middleware("auth:api");
Route::get("/logout",   [AuthController::class, "EliminarToken"]) -> middleware("auth:api");