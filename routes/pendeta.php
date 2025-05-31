<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendetaController;

Route::prefix('pendeta')->group(function () {

    Route::controller(PendetaController::class)->group(function () {

        // menampilkan semua data pendeta
        Route::get('/', 'index')->name('pendeta.index');
        
        // menampilkan formulir tambah pendeta
        Route::get('/create', 'create')->name('pendeta.create');
        Route::get('/print', 'print')->name('pendeta.print');

        // simpan data pendeta baru
        Route::post('/store', 'store')->name('pendeta.store');

        // tampilkan detail pendeta
        Route::get('{id}/detail', 'show')->name('pendeta.show');

        // menampilkan form edit pendeta
        Route::get('{id}/edit', 'edit')->name('pendeta.edit');

        // update data pendeta
        Route::put('{id}/update', 'update')->name('pendeta.update');

        // hapus permanen data pendeta
        Route::delete('{id}/forceDelete', 'forceDelete')->name('pendeta.forceDelete');

    });

});
