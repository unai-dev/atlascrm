<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EnterpriseController;
use Illuminate\Support\Facades\Route;

Route::get("/", fn() => response()->json(["message" => "¡AtlasCRM is running!"]));

/**
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                          AUTH ROUTES
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

Route::middleware("jwt.auth")->group(function () {
    Route::apiResource("/clients", ClientController::class);
    Route::apiResource("/addresses", AddressController::class);
    Route::apiResource("/cities", CityController::class);
    Route::apiResource("/countries", CountryController::class);
    Route::apiResource("/enterprises", EnterpriseController::class);

    Route::get("/who", [AuthController::class, "who"]);
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::post("/refresh", [AuthController::class, "refresh"]);
});
