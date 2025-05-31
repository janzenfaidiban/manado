<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajelisController;

Route::prefix('majelis')->group(function () {

    Route::controller(MajelisController::class)->group(function () {

        // menampilkan semua data majelis
        Route::get('/', 'index')->name('majelis.index');
        Route::get('/print', 'print')->name('majelis.print');
        
        // menampilkan formulir tambah majelis
        Route::get('/create', 'create')->name('majelis.create');

        // simpan data majelis baru
        Route::post('/store', 'store')->name('majelis.store');

        // tampilkan detail majelis
        Route::get('{id}/detail', 'show')->name('majelis.show');

        // menampilkan form edit majelis
        Route::get('{id}/edit', 'edit')->name('majelis.edit');

        // update data majelis
        Route::put('{id}/update', 'update')->name('majelis.update');

        // hapus permanen data majelis
        Route::delete('{id}/forceDelete', 'forceDelete')->name('majelis.forceDelete');

    });

});
