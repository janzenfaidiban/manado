<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\AdminSuper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminSuperController extends Controller
{
    // Menampilkan daftar AdminSuper dengan pagination dan pencarian nama
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = AdminSuper::query()
            ->whereHas('user', function($q) {
                $q->role('admin');  // spatie menyediakan scope role()
            });

        if ($search) {
            $query->where('nama_lengkap', 'LIKE', '%' . $search . '%');
        }

        $adminSupers = $query->orderBy('nama_lengkap', 'asc')->paginate(10);

        $pageTitle = 'Data Admin Super';
        $pageDescription = 'Menampilkan semua data Admin Super.';

        return view('admin-super.index', compact(
            'pageTitle',
            'pageDescription',
            'adminSupers',
        ))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    // Show form to add new AdminSuper
    public function create()
    {
        $pageTitle = 'Tambah Admin Super Baru';
        $pageDescription = 'Formulir tambah data admin super baru.';

        return view('admin-super.form', compact('pageTitle', 'pageDescription'));
    }

    // Store new AdminSuper data
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp'        => 'required|string|max:20',
            'email'        => 'required|email|unique:admin_supers,email',
            'keterangan'   => 'nullable|string',

            'username'     => 'required|string|unique:users,username',
            'password'     => 'required|string|min:6|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name'     => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Assign role 'admin' ke user baru
        $user->assignRole('admin');

        // Buat AdminSuper dengan relasi ke user tersebut
        AdminSuper::create([
            'user_id'      => $user->id,
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp'        => $request->no_hp,
            'email'        => $request->email,
            'keterangan'   => $request->keterangan,
        ]);

        return redirect()->route('admin.index')->with('success', 'Data Admin Super berhasil disimpan.');
    }

    // Show details of existing AdminSuper (tampilan show)
    public function show($id)
    {
        $data = AdminSuper::findOrFail($id);

        $pageTitle = 'Detail Data Admin Super';
        $pageDescription = 'Menampilkan detail data admin super.';

        return view('admin-super.show', compact('pageTitle', 'pageDescription', 'data'));
    }


    // Show form to edit existing AdminSuper
    public function edit($id)
    {
        $data = AdminSuper::findOrFail($id);

        $pageTitle = 'Edit Data Admin Super';
        $pageDescription = 'Formulir edit data admin super.';

        return view('admin-super.form', compact('pageTitle', 'pageDescription', 'data'));
    }

    // Update existing AdminSuper data
    public function update(Request $request, $id)
    {
        $adminSuper = AdminSuper::findOrFail($id);
        $user = $adminSuper->user; // Pastikan relasi user sudah ada di model AdminSuper

        // Buat rules validasi
        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'no_hp'        => 'required|string|max:20',
            'email'        => 'required|email|unique:admin_supers,email,' . $adminSuper->id,
            'keterangan'   => 'nullable|string',
            'username'     => 'required|string|unique:users,username,' . $user->id,
        ];

        // Password hanya validasi jika diisi
        if ($request->filled('password')) {
            $rules['password'] = 'string|min:6|confirmed';
        }

        $request->validate($rules);

        // Update data AdminSuper
        $adminSuper->update([
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp'        => $request->no_hp,
            'email'        => $request->email,
            'keterangan'   => $request->keterangan,
        ]);

        // Update user
        $user->username = $request->username;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Pastikan user punya role 'admin'
        if (!$user->hasRole('admin')) {
            $user->assignRole('admin');
        }

        return redirect()->back()->with('success', 'Data Admin Super berhasil diperbarui.');
    }


    // forceDelete (delete permanently)
    public function forceDelete($id)
    {

        // dd('delete admin');
        try {
            $data = AdminSuper::findOrFail($id);

            $data->forceDelete();

            return redirect()->back()->with('success', 'Admin Super berhasil dihapus permanen.');
        
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Admin Super: ' . $e->getMessage());
        }
    }



}
