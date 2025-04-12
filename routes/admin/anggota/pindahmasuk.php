<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\anggota\PindahMasukController;

Route::prefix('anggota')->group(function () {

    Route::controller(PindahMasukController::class)->group(function() {

        // menampilkan semua data anggota baru
        Route::get('/pindahmasuk', 'index')->name('admin.anggota.pindahmasuk');
        
        // menampilkan formulir tambah anggota baru
        Route::get('/pindahmasuk/create', 'create')->name('admin.anggota.pindahmasuk.create');


    });

});
