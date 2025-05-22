<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// siteInfo 
use App\Http\Controllers\SiteInfoController as SiteInfoController;

use App\Http\Controllers\DasborController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\ThemeController;

Route::post('/update-theme', [ThemeController::class, 'updateTheme'])->name('update.theme');



Route::group(['middleware' => ['auth']], function () {

    // Redirect setelah login berdasarkan role
    Route::get('/', function () {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return redirect('/admin/dasbor');
        } elseif ($user->hasRole('pimpinan')) {
            return redirect('/pimpinan/dasbor');
        } 

        return redirect('/login'); // Default jika tidak ada role
    });


    // admin
    // routes untuk admin super
    Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

        Route::get('/dasbor', [DasborController::class, 'index'])->name('admin.dasbor');
        
        Route::get('/statistik-jemaat', [StatistikController::class, 'statistikJemaat'])->name('admin.statistikJemaat');
        Route::get('/statistik-majelis', [StatistikController::class, 'statistikMajelis'])->name('admin.statistikMajelis');

        require 'pendeta.php';
        require 'majelis.php';
        require 'jemaat.php';
        require 'admin-super.php';

    });
    






    

});

Auth::routes();

