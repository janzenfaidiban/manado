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
    // menampilkan data dari databasei
    public function index()
    {
        // Ambil parameter pencarian
        $search = request()->search;

        // Mulai query dari Anggota
        $query = Anggota::query();

        // Jika ada pencarian, filter berdasarkan nama_lengkap
        if ($search) {
            $query->where('nama_lengkap', 'LIKE', '%' . $search . '%');
        }

        // Urutkan berdasarkan nama_lengkap ascending
        $datas = $query->orderBy('nama_lengkap', 'asc')->paginate(2);

        $pageTitle = 'Semua Anggota';
        $pageDescription = 'Menampilkan semua data anggota.';

        return view('admin.anggota.semua', compact(
            'pageTitle',
            'pageDescription',
            'datas',
        ))->with('i', (request()->input('page', 1) - 1) * 2);
    }

    // create
    // menampilkan form tambah data

    // store
    // proses tambah data ke database

    // edit
    // menampilkan form ubah data

    // update
    // proses ubah simpan data yang dirubah ke database

    // softDelete
    // proses hapus data secara sementara (masukan ke dalam tempat sampah)

    // restore
    // mengembalikan data dari status softDelete (keluarkan dari tempat sampah)

    // forceDelete
    // menghapus data secara permanen
    
}