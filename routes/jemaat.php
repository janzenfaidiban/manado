<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JemaatController;

Route::prefix('jemaat')->group(function () {

    Route::controller(JemaatController::class)->group(function () {

        Route::get('/', 'index')->name('jemaat.index');
        Route::get('/print', 'print')->name('jemaat.print');
        Route::get('/create', 'create')->name('jemaat.create');
        Route::post('/store', 'store')->name('jemaat.store');
        Route::get('{id}/detail', 'show')->name('jemaat.show');
        Route::get('{id}/edit', 'edit')->name('jemaat.edit');
        Route::put('{id}/update', 'update')->name('jemaat.update');
        Route::delete('{id}/forceDelete', 'forceDelete')->name('jemaat.forceDelete');

    });

});
