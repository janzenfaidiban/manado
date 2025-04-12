<?php

namespace App\Http\Controllers\admin\anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;

// models
use App\Models\User;
use App\Models\Anggota;

class PindahKeluarController extends Controller
{

    // index
    public function index()
    {

        $pageTitle = 'Anggota Pindah Keluar';
        $pageDescription = 'Menampilkan semua data anggota pindah keluar.';

        return view('admin.anggota.pindahkeluar', compact(
            'pageTitle',
            'pageDescription',
        ))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    // create
    
}