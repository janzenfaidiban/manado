<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\datamaster\FakultasController;

Route::prefix('fakultas')->group(function () {

    Route::controller(FakultasController::class)->group(function() {

        // menampilkan semua data fakultas semua
        Route::get('/', 'index')->name('admin.fakultas.index');
        
        // menampilkan formulir tambah fakultas semua
        Route::get('/semua/create', 'create')->name('admin.fakultas.create');

        // store
        Route::post('semua/store', 'store')->name('admin.fakultas.store');

        // show
        Route::get('semua/{id}/detail', 'show')->name('admin.fakultas.show');

        // edit
        Route::get('semua/{id}/edit', 'edit')->name('admin.fakultas.edit');

        // update
        Route::put('semua/{id}/update', 'update')->name('admin.fakultas.update');

        // forceDelete | ForceDeletes > menghapus permanen dari database
        Route::delete('semua/{id}/ForceDelete', 'forceDelete')->name('admin.fakultas.forceDelete');

    });

});
