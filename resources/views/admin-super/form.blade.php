@extends('layouts.app')
@section('content')

<div class="container">
    <div class="page-inner">

        <x-page-header 
            :pageTitle="$pageTitle" 
            :pageDescription="$pageDescription" 
        />

        <div class="page-category">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <x-alert />

                            <form 
                                action="{{ isset($data) ? route('admin.update', $data->id) : route('admin.store') }}" 
                                method="POST"
                            >
                                @csrf
                                @if(isset($data))
                                    @method('PUT')
                                @endif

                                <!-- Nama Lengkap -->
                                <div class="form-group mb-3">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                        id="nama_lengkap" 
                                        name="nama_lengkap" 
                                        placeholder="Masukkan nama lengkap" 
                                        value="{{ old('nama_lengkap', $data->nama_lengkap ?? '') }}" 
                                        
                                    >
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- No HP -->
                                <div class="form-group mb-3">
                                    <label for="no_hp">No HP</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('no_hp') is-invalid @enderror" 
                                        id="no_hp" 
                                        name="no_hp" 
                                        placeholder="Masukkan nomor HP" 
                                        value="{{ old('no_hp', $data->no_hp ?? '') }}" 
                                        
                                    >
                                    @error('no_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input 
                                        type="email" 
                                        class="form-control @error('email') is-invalid @enderror" 
                                        id="email" 
                                        name="email" 
                                        placeholder="Masukkan email" 
                                        value="{{ old('email', $data->email ?? '') }}" 
                                        
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Username -->
                                <div class="form-group mb-3">
                                    <label for="username">Username</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('username') is-invalid @enderror" 
                                        id="username" 
                                        name="username" 
                                        value="{{ old('username', $data->user->username ?? '') }}" 
                                        
                                    >
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-3">
                                    <label for="password">Password (Biarkan kosong jika tidak diubah)</label>
                                    <input 
                                        type="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        id="password" 
                                        name="password"
                                    >
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Konfirmasi Password -->
                                <div class="form-group mb-3">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input 
                                        type="password" 
                                        class="form-control" 
                                        id="password_confirmation" 
                                        name="password_confirmation"
                                    >
                                </div>

                                <!-- Keterangan -->
                                <div class="form-group mb-3">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea 
                                        class="form-control @error('keterangan') is-invalid @enderror" 
                                        id="keterangan" 
                                        name="keterangan" 
                                        placeholder="Tambahkan keterangan jika ada"
                                        rows="3"
                                    >{{ old('keterangan', $data->keterangan ?? '') }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr class="my-4">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                    <a href="{{ route('admin.show', $data->id) }}" class="btn">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('admin.index') }}" class="btn">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@stop
