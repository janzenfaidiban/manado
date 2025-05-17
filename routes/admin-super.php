<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSuperController;

Route::prefix('admin-super')->group(function () {

    Route::controller(AdminSuperController::class)->group(function () {

        Route::get('/', 'index')->name('admin.index');
        Route::get('/create', 'create')->name('admin.create');
        Route::post('/store', 'store')->name('admin.store');
        Route::get('{id}/detail', 'show')->name('admin.show');
        Route::get('{id}/edit', 'edit')->name('admin.edit');
        Route::put('{id}/update', 'update')->name('admin.update');
        Route::delete('{id}/forceDelete', 'forceDelete')->name('admin.forceDelete');

    });

});
