<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\datamaster\ProgramStudiController;

Route::prefix('programstudi')->group(function () {

    Route::controller(ProgramStudiController::class)->group(function() {

        // menampilkan semua data programstudi semua
        Route::get('/', 'index')->name('admin.programstudi.index');
        
        // menampilkan formulir tambah programstudi semua
        Route::get('/semua/create', 'create')->name('admin.programstudi.create');

        // store
        Route::post('semua/store', 'store')->name('admin.programstudi.store');

        // show
        Route::get('semua/{id}/detail', 'show')->name('admin.programstudi.show');

        // edit
        Route::get('semua/{id}/edit', 'edit')->name('admin.programstudi.edit');

        // update
        Route::put('semua/{id}/update', 'update')->name('admin.programstudi.update');

        // forceDelete | ForceDeletes > menghapus permanen dari database
        Route::delete('semua/{id}/ForceDelete', 'forceDelete')->name('admin.programstudi.forceDelete');

    });

});
