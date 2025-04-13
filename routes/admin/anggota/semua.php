<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\anggota\SemuaController;

Route::prefix('anggota')->group(function () {

    Route::controller(SemuaController::class)->group(function() {

        // menampilkan semua data anggota semua
        Route::get('/semua', 'index')->name('admin.anggota.semua');
        
        // menampilkan formulir tambah anggota semua
        Route::get('/semua/create', 'create')->name('admin.anggota.semua.create');

        // store
        Route::post('semua/store', 'store')->name('admin.anggota.semua.store');

        Route::get('semua/create/get-fakultas/{kampus_id}', [SemuaController::class, 'getFakultas']);
        Route::get('semua/create/get-program-studi/{fakultas_id}', [SemuaController::class, 'getProgramStudi']);



        // show
        Route::get('semua/{id}/detail', 'show')->name('admin.anggota.semua.show');

        // edit
        Route::get('semua/{id}/edit', 'edit')->name('admin.anggota.semua.edit');

        // update
        Route::put('semua/{id}/update', 'update')->name('admin.anggota.semua.update');

        // forceDelete | ForceDeletes > menghapus permanen dari database
        Route::delete('semua/{id}/ForceDelete', 'forceDelete')->name('admin.anggota.semua.forceDelete');

    });

});
