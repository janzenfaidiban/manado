<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendeta;

class PendetaController extends Controller
{
    // Menampilkan daftar Pendeta dengan pagination dan pencarian nama
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Pendeta::query();

        if ($search) {
            $query->where('nama_lengkap', 'LIKE', '%' . $search . '%');
        }

        $pendetas = $query->orderBy('nama_lengkap', 'asc')->paginate(10);

        $pageTitle = 'Data Pendeta';
        $pageDescription = 'Menampilkan semua data Pendeta.';

        return view('pendeta.index', compact(
            'pageTitle',
            'pageDescription',
            'pendetas',
        ))->with('i', ($request->input('page', 1) - 1) * 10);
    }


    // print
    public function print(Request $request)
    {
        $search = $request->input('search');

        $query = Pendeta::query();

        if ($search) {
            $query->where('nama_lengkap', 'LIKE', '%' . $search . '%');
        }

        $pendetas = $query->orderBy('nama_lengkap', 'asc')->get();

        $pageTitle = 'Cetak Data Pendeta';
        $pageDescription = 'Menampilkan semua data Pendeta.';

        return view('pendeta.print', compact(
            'pageTitle',
            'pageDescription',
            'pendetas',
        ))->with('i', ($request->input('page', 1) - 1) * 10);
    }


    // Show form to add new Pendeta
    public function create()
    {
        $pageTitle = 'Tambah Pendeta Baru';
        $pageDescription = 'Formulir tambah data pendeta baru.';

        return view('pendeta.form', compact('pageTitle', 'pageDescription'));
    }

    // Store new Pendeta data
    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'nama_lengkap'        => 'required|string|max:255',
            'jenis_kelamin'       => 'required|in:L,P',
            'tanggal_lahir'       => 'required|date',
            'tempat_lahir'        => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|in:SD,SMP,SMA/SMK,S1,S2,S3,Lainnya',
            'foto_profil'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
            'keterangan'          => 'nullable|string',
        ]);

        $data = $request->only([
            'nama_lengkap',
            'jenis_kelamin',
            'tanggal_lahir',
            'tempat_lahir',
            'pendidikan_terakhir',
            'keterangan',
        ]);

        // Handle photo upload if exists
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_pendeta', $filename);
            $data['foto_profil'] = $filename;
        }

        $pendeta = Pendeta::create($data);

        return redirect()->route('pendeta.show', $pendeta->id)
                         ->with('success', 'Data Pendeta berhasil disimpan.');
    }

    // Show form to edit existing Pendeta
    public function edit($id)
    {
        $data = Pendeta::findOrFail($id);

        $pageTitle = 'Edit Data Pendeta';
        $pageDescription = 'Formulir edit data pendeta.';

        return view('pendeta.form', compact('pageTitle', 'pageDescription', 'data'));
    }

    // Update existing Pendeta data
    public function update(Request $request, $id)
    {
        $pendeta = Pendeta::findOrFail($id);

        // Validation rules
        $request->validate([
            'nama_lengkap'        => 'required|string|max:255',
            'jenis_kelamin'       => 'required|in:L,P',
            'tanggal_lahir'       => 'required|date',
            'tempat_lahir'        => 'required|string|max:255',
            'pendidikan_terakhir' => 'required|in:SD,SMP,SMA/SMK,S1,S2,S3,Lainnya',
            'foto_profil'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan'          => 'nullable|string',
        ]);

        $data = $request->only([
            'nama_lengkap',
            'jenis_kelamin',
            'tanggal_lahir',
            'tempat_lahir',
            'pendidikan_terakhir',
            'keterangan',
        ]);

        // Handle photo upload (replace old photo if new uploaded)
        if ($request->hasFile('foto_profil')) {
            // Delete old photo if exists
            if ($pendeta->foto_profil && \Storage::exists('public/foto_pendeta/' . $pendeta->foto_profil)) {
                \Storage::delete('public/foto_pendeta/' . $pendeta->foto_profil);
            }

            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_pendeta', $filename);
            $data['foto_profil'] = $filename;
        }

        $pendeta->update($data);

        return redirect()->back()->with('success', 'Data Pendeta berhasil diperbarui.');
    }

    // forceDelete (delete permanently)
    public function forceDelete($id)
    {

        try {
            $data = Pendeta::findOrFail($id);

            $data->forceDelete();

            return redirect()->back()->with('success', 'Pendeta berhasil dihapus permanen.');
        
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Pendeta: ' . $e->getMessage());
        }
    }



    
}
