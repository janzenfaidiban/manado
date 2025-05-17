<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// siteInfo 
use App\Http\Controllers\SiteInfoController as SiteInfoController;

// admin
use App\Http\Controllers\admin\DasborController as AdminDasborController;

// operator
use App\Http\Controllers\admin\DasborController as OperatorDasborController;

// pimpinan
use App\Http\Controllers\pimpinan\DasborController as PimpinanDasborController;

// theme setups
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

        Route::get('/dasbor', [adminDasborController::class, 'index'])->name('admin.dasbor');

        require 'pendeta.php';
        require 'majelis.php';
        require 'jemaat.php';
        require 'admin-super.php';

    });
    






    

});

Auth::routes();

