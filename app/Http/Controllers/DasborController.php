<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// models
use App\Models\User;
use App\Models\Jemaat;
use App\Models\Majelis;
use App\Models\Pendeta;
use App\Models\AdminSuper;

class DasborController extends Controller
{
      
    // index
    public function index()
    {

        $totalJemaat = Jemaat::count();
        $totalMajelis = Majelis::count();
        $totalPendeta = Pendeta::count();
        $totalAdminSuper = AdminSuper::count();




        // teks untuk judul dan deskripsi halaman
        $pageTitle = 'Dasbor';
        $pageDescription = 'Halaman utama sistem informasi ketika pengguna berhasil login. Menampilkan berbagai rekapan data hasil pengelolaan pada sistem informasi.';
    
        return view('dasbor', compact(
            'pageTitle',
            'pageDescription',

            'totalJemaat',
            'totalMajelis',
            'totalPendeta',
            'totalAdminSuper',
        ));
    }



}
