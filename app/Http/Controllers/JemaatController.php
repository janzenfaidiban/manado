<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jemaat;

class JemaatController extends Controller
{
    // Menampilkan daftar Jemaat dengan pagination dan pencarian nama
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Jemaat::query();

        if ($search) {
            $query->where('nama_lengkap', 'LIKE', '%' . $search . '%');
        }

        $jemaats = $query->orderBy('nama_lengkap', 'asc')->paginate(10);

        $pageTitle = 'Data Jemaat';
        $pageDescription = 'Menampilkan semua data Jemaat.';

        return view('jemaat.index', compact(
            'pageTitle',
            'pageDescription',
            'jemaats',
        ))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    // Show form to add new Jemaat
    public function create()
    {
        $pageTitle = 'Tambah Jemaat Baru';
        $pageDescription = 'Formulir tambah data jemaat baru.';

        return view('jemaat.form', compact('pageTitle', 'pageDescription'));
    }

    // Store new Jemaat data
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'        => 'required|string|max:255',
            'jenis_kelamin'       => 'required|in:L,P',
            'tanggal_lahir'       => 'required|date',
            'tempat_lahir'        => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|in:SD,SMP,SMA/SMK,S1,S2,S3,Lainnya',
            'pekerjaan'           => 'required|in:Pelajar,Mahasiswa,PNS,TNI,POLRI,Guru,Petani,Wiraswasta,Lainnya',
            'lingkungan'          => 'required|in:1,2,3,4',
        ]);

        $data = $request->only([
            'nama_lengkap',
            'jenis_kelamin',
            'tanggal_lahir',
            'tempat_lahir',
            'pendidikan_terakhir',
            'pekerjaan',
            'lingkungan',
        ]);

        // Tambahkan user_id jika ada autentikasi
        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        }

        $jemaat = Jemaat::create($data);

        return redirect()->route('jemaat.index')->with('success', 'Data Jemaat berhasil disimpan.');
    }

    // Show form to edit existing Jemaat
    public function edit($id)
    {
        $jemaat = Jemaat::findOrFail($id);

        $pageTitle = 'Edit Data Jemaat';
        $pageDescription = 'Formulir edit data jemaat.';

        return view('jemaat.form', compact('pageTitle', 'pageDescription', 'jemaat'));
    }

    // Update existing Jemaat data
    public function update(Request $request, $id)
    {
        $jemaat = Jemaat::findOrFail($id);

        $request->validate([
            'nama_lengkap'        => 'required|string|max:255',
            'jenis_kelamin'       => 'required|in:L,P',
            'tanggal_lahir'       => 'required|date',
            'tempat_lahir'        => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|in:SD,SMP,SMA/SMK,S1,S2,S3,Lainnya',
            'pekerjaan'           => 'required|in:Pelajar,Mahasiswa,PNS,TNI,POLRI,Guru,Petani,Wiraswasta,Lainnya',
            'lingkungan'          => 'required|in:1,2,3,4',
        ]);

        $data = $request->only([
            'nama_lengkap',
            'jenis_kelamin',
            'tanggal_lahir',
            'tempat_lahir',
            'pendidikan_terakhir',
            'pekerjaan',
            'lingkungan',
        ]);

        $jemaat->update($data);

        return redirect()->route('jemaat.index')->with('success', 'Data Jemaat berhasil diperbarui.');
    }
}
