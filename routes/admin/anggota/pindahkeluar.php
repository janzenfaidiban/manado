<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\anggota\PindahKeluarController;

Route::prefix('anggota')->group(function () {

    Route::controller(PindahKeluarController::class)->group(function() {

        // menampilkan semua data anggota baru
        Route::get('/pindahkeluar', 'index')->name('admin.anggota.pindahkeluar');
        
        // menampilkan formulir tambah anggota baru
        Route::get('/pindahkeluar/create', 'create')->name('admin.anggota.pindahkeluar.create');


    });

});
