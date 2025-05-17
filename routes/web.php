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
    

    // pimpinan
    // routes untuk pimpinan
    Route::group(['middleware' => ['role:pimpinan'], 'prefix' => 'pimpinan'], function () {
        
        // dasbor
        Route::get('/', [PimpinanDasborController::class, 'index'])->name('pimpinan.dasbor');
        Route::get('/dasbor', [PimpinanDasborController::class, 'index'])->name('pimpinan.dasbor');
        
        // profil
        Route::get('/profil', [PimpinanDasborController::class, 'profil'])->name('pimpinan.profil');

        // STATISTIK

        // Statistik Anggota Berdasarkan Status
        Route::get('/statistik/anggota', [AdminDasborController::class, 'getStatistikAnggota'])->name('pimpinan.statistik.anggota');
        
        // Statistik Alumni
        Route::get('/statistik/alumni', [AdminDasborController::class, 'getStatistikAlumni'])->name('pimpinan.statistik.alumni');
        
        // Statistik Program Studi, Fakultas & Universitas
        Route::get('/statistik/program-studi', [AdminDasborController::class, 'getStatistikProgramStudi'])->name('pimpinan.statistik.programstudi');

        
        require 'pimpinan/anggota/anggota.php';
        
        // data master
        require 'pimpinan/datamaster/kampus.php';
        require 'pimpinan/datamaster/fakultas.php';
        require 'pimpinan/datamaster/programstudi.php';

    });








    // Routes untuk Admin Master
    Route::group(['middleware' => ['role:adminmaster'], 'prefix' => 'adminmaster'], function () {

        // beranda
        Route::get('/', [BerandaAdminMasterController::class, 'index'])->name('adminmaster.beranda');
        
        // siteInfo
        Route::get('/faq', [SiteInfoController::class, 'faq'])->name('adminmaster.faq');
        Route::get('/panduan', [SiteInfoController::class, 'panduan'])->name('adminmaster.panduan');
        Route::get('/peta-situs', [SiteInfoController::class, 'petaSitus'])->name('adminmaster.petaSitus');
        Route::get('/hak-cipta', [SiteInfoController::class, 'hakCipta'])->name('adminmaster.hakCipta');
        Route::get('/syarat-ketentuan', [SiteInfoController::class, 'syaratKetentuan'])->name('adminmaster.syaratKetentuan');


    });















    // Routes untuk Admin Klasis
    Route::group(['middleware' => ['role:adminklasis'], 'prefix' => 'adminklasis'], function () {

        // beranda
        Route::get('/', [BerandaAdminKlasisController::class, 'index'])->name('adminklasis.beranda');
        
        // siteInfo
        Route::get('/faq', [SiteInfoController::class, 'faq'])->name('adminklasis.faq');
        Route::get('/panduan', [SiteInfoController::class, 'panduan'])->name('adminklasis.panduan');
        Route::get('/peta-situs', [SiteInfoController::class, 'petaSitus'])->name('adminklasis.petaSitus');
        Route::get('/hak-cipta', [SiteInfoController::class, 'hakCipta'])->name('adminklasis.hakCipta');
        Route::get('/syarat-ketentuan', [SiteInfoController::class, 'syaratKetentuan'])->name('adminklasis.syaratKetentuan');

    });























    

});

Auth::routes();

