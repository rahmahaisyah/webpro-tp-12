<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return redirect()->route('pegawai.index');
});

Route::resource('pegawai', PegawaiController::class);

