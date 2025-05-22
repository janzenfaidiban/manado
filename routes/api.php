<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StatistikController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API JEMAAT BERDASARKAN STATUS BAPTIS (status_baptis)
Route::get('/chart-jemaat-per-status-baptis', [StatistikController::class, 'chartJemaatPerStatusBaptis'])->name('chartJemaatPerStatusBaptis');

// API JEMAAT BERDASARKAN LINGKUNGAN (lingkungan)
Route::get('/chart-jemaat-per-lingkungan', [StatistikController::class, 'chartJemaatPerLingkungan'])->name('chartJemaatPerLingkungan');

// API JEMAAT BERDASARKAN PENDIDIKAN TERAKHIR (pendidikan_terakhir)
Route::get('/chart-jemaat-per-pendidikan-terakhir', [StatistikController::class, 'chartJemaatPerPendidikanTerakhir'])->name('chartJemaatPerPendidikanTerakhir');

// API JEMAAT BERDASARKAN PEKERJAAN (pekerjaan)
Route::get('/chart-jemaat-per-pekerjaan', [StatistikController::class, 'chartJemaatPerPekerjaan'])->name('chartJemaatPerPekerjaan');

// API JEMAAT PER JENIS KELAMIN 
Route::get('/chart-jemaat-per-jenis-kelamin', [StatistikController::class, 'chartJemaatPerJenisKelamin'])->name('chartJemaatPerJenisKelamin');

// API MAJELIS PER JENIS KELAMIN
Route::get('/chart-majelis-per-jenis-kelamin', [StatistikController::class, 'chartMajelisPerJenisKelamin'])->name('chartMajelisPerJenisKelamin');

// API PENDETA PER JENIS KELAMIN
Route::get('/chart-pendeta-per-jenis-kelamin', [StatistikController::class, 'chartPendetaPerJenisKelamin'])->name('chartPendetaPerJenisKelamin');