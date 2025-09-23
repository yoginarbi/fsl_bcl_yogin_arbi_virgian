<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PengirimanController;

Route::get('/', function () {
    return view('home');
});

Route::resource('armadas', ArmadaController::class);
Route::resource('pemesanans', PemesananController::class);
Route::resource('pengirimans', PengirimanController::class);
