<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\anggota\BaruController;

Route::prefix('anggota')->group(function () {

    Route::controller(BaruController::class)->group(function() {

        // menampilkan semua data anggota baru
        Route::get('/baru', 'index')->name('admin.anggota.baru');
        
        // menampilkan formulir tambah anggota baru
        Route::get('/baru/create', 'create')->name('admin.anggota.baru.create');


    });

});
