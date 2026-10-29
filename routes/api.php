<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StafApotekController;
use App\Http\Controllers\ObatController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('pelanggan', PelangganController::class);
Route::apiResource('staf-apotek', StafApotekController::class);
Route::apiResource('obat', ObatController::class);
