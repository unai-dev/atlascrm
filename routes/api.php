<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get("/", fn() => response()->json(["message" => "¡AtlasCRM is running!"]));

Route::middleware("jwt.auth")->group(function () {
    Route::apiResource("/clients", ClientController::class);
    Route::apiResource("/addresses", AddressController::class);
    Route::apiResource("/cities", CityController::class);
    Route::apiResource("/countries", CountryController::class);
});
