<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanPmiController;

Route::get('/simpadu', function () {
    return view('simpadu.app');
});

Route::get('/laporan-pmi/pdf', [LaporanPmiController::class, 'exportPdf'])
    ->name('laporan.pmi.pdf')
    ->middleware('auth');
