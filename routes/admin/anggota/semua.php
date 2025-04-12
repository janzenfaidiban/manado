<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\anggota\SemuaController;

Route::prefix('anggota')->group(function () {

    Route::controller(SemuaController::class)->group(function() {

        // menampilkan semua data anggota semua
        Route::get('/semua', 'index')->name('admin.anggota.semua');
        
        // menampilkan formulir tambah anggota semua
        Route::get('/semua/create', 'create')->name('admin.anggota.semua.create');


    });

});
