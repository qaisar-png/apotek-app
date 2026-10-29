<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', fn () => redirect('/pelanggan'));

Route::get('/pelanggan', [WebController::class, 'pelanggan']);
Route::post('/pelanggan', [WebController::class, 'simpanPelanggan']);

Route::get('/staf-apotek', [WebController::class, 'staf']);
Route::post('/staf-apotek', [WebController::class, 'simpanStaf']);

Route::get('/obat', [WebController::class, 'obat']);
Route::post('/obat', [WebController::class, 'simpanObat']);