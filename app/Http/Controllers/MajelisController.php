<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Majelis;

class MajelisController extends Controller
{
    // Menampilkan daftar Majelis dengan pagination dan pencarian nama
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Majelis::query();

        if ($search) {
            $query->where('nama_lengkap', 'LIKE', '%' . $search . '%');
        }

        $majels = $query->orderBy('nama_lengkap', 'asc')->paginate(10);

        $pageTitle = 'Data Majelis';
        $pageDescription = 'Menampilkan semua data Majelis.';

        return view('majelis.index', compact(
            'pageTitle',
            'pageDescription',
            'majels',
        ))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    // Show form to add new Majelis
    public function create()
    {
        $pageTitle = 'Tambah Majelis Baru';
        $pageDescription = 'Formulir tambah data majelis baru.';

        return view('majelis.form', compact('pageTitle', 'pageDescription'));
    }

    // Store new Majelis data
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'        => 'required|string|max:255',
            'jenis_kelamin'       => 'required|in:L,P',
            'tanggal_lahir'       => 'required|date',
            'tempat_lahir'        => 'required|string|max:255',
            'lingkungan'          => 'required|in:1,2,3,4',
            'jabatan'             => 'required|string|max:255',
            'periode_jabatan'     => 'required|string|max:255',
            'pekerjaan'           => 'required|in:Pelajar,Mahasiswa,PNS,TNI,POLRI,Guru,Petani,Wiraswasta,Lainnya',
            'pendidikan_terakhir' => 'required|in:SD,SMP,SMA/SMK,S1,S2,S3,Lainnya',
            'foto_profil'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan'          => 'nullable|string',
        ]);

        $data = $request->only([
            'nama_lengkap',
            'jenis_kelamin',
            'tanggal_lahir',
            'tempat_lahir',
            'lingkungan',
            'jabatan',
            'periode_jabatan',
            'pekerjaan',
            'pendidikan_terakhir',
            'keterangan',
        ]);

        // Handle upload foto_profil
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/majelis'), $filename);
            $data['foto_profil'] = 'uploads/majelis/' . $filename;
        }

        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        }

        Majelis::create($data);

        return redirect()->route('majelis.index')->with('success', 'Data Majelis berhasil disimpan.');
    }


    // Show form to edit existing Majelis
    public function edit($id)
    {
        $majelis = Majelis::findOrFail($id);

        $pageTitle = 'Edit Data Majelis';
        $pageDescription = 'Formulir edit data majelis.';

        return view('majelis.form', compact('pageTitle', 'pageDescription', 'majelis'));
    }

    // Update existing Majelis data
    public function update(Request $request, $id)
    {
        $majelis = Majelis::findOrFail($id);

        $request->validate([
            'nama_lengkap'        => 'required|string|max:255',
            'jenis_kelamin'       => 'required|in:L,P',
            'tanggal_lahir'       => 'required|date',
            'tempat_lahir'        => 'required|string|max:255',
            'lingkungan'          => 'required|in:1,2,3,4',
            'jabatan'             => 'required|string|max:255',
            'periode_jabatan'     => 'required|string|max:255',
            'pekerjaan'           => 'required|in:Pelajar,Mahasiswa,PNS,TNI,POLRI,Guru,Petani,Wiraswasta,Lainnya',
            'pendidikan_terakhir' => 'required|in:SD,SMP,SMA/SMK,S1,S2,S3,Lainnya',
            'foto_profil'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan'          => 'nullable|string',
        ]);

        $data = $request->only([
            'nama_lengkap',
            'jenis_kelamin',
            'tanggal_lahir',
            'tempat_lahir',
            'lingkungan',
            'jabatan',
            'periode_jabatan',
            'pekerjaan',
            'pendidikan_terakhir',
            'keterangan',
        ]);

        // Handle upload foto_profil (replace old if new uploaded)
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/majelis'), $filename);
            $data['foto_profil'] = 'uploads/majelis/' . $filename;

            // Optional: Hapus file lama jika ada
            if ($majelis->foto_profil && file_exists(public_path($majelis->foto_profil))) {
                unlink(public_path($majelis->foto_profil));
            }
        }

        $majelis->update($data);

        return redirect()->route('majelis.index')->with('success', 'Data Majelis berhasil diperbarui.');
    }


    
}
