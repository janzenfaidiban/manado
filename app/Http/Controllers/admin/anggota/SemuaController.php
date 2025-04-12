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

class SemuaController extends Controller
{

    // index
    public function index()
    {

        $pageTitle = 'Semua Anggota';
        $pageDescription = 'Menampilkan semua data anggota.';

        return view('admin.anggota.semua', compact(
            'pageTitle',
            'pageDescription',
        ))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    // create
    
}