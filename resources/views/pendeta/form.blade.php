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
                                action="{{ isset($data) ? route('pendeta.update', $data->id) : route('pendeta.store') }}" 
                                enctype="multipart/form-data" 
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
                                        required
                                    >
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="form-group mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select 
                                        class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                        id="jenis_kelamin" 
                                        name="jenis_kelamin" 
                                        required
                                    >
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="form-group mb-3">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input 
                                        type="date" 
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                        id="tanggal_lahir" 
                                        name="tanggal_lahir" 
                                        value="{{ old('tanggal_lahir', isset($data) ? $data->tanggal_lahir->format('Y-m-d') : '') }}" 
                                        required
                                    >
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tempat Lahir -->
                                <div class="form-group mb-3">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                        id="tempat_lahir" 
                                        name="tempat_lahir" 
                                        placeholder="Masukkan tempat lahir" 
                                        value="{{ old('tempat_lahir', $data->tempat_lahir ?? '') }}" 
                                        required
                                    >
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pendidikan Terakhir -->
                                <div class="form-group mb-3">
                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                    <select 
                                        class="form-select @error('pendidikan_terakhir') is-invalid @enderror" 
                                        id="pendidikan_terakhir" 
                                        name="pendidikan_terakhir" 
                                        required
                                    >
                                        <option value="">Pilih Pendidikan Terakhir</option>
                                        @php
                                            $pendidikanOptions = ['SD', 'SMP', 'SMA/SMK', 'S1', 'S2', 'S3', 'Lainnya'];
                                        @endphp
                                        @foreach($pendidikanOptions as $option)
                                            <option value="{{ $option }}" {{ old('pendidikan_terakhir', $data->pendidikan_terakhir ?? '') == $option ? 'selected' : '' }}>
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan_terakhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Foto Profil -->
                                <div class="form-group mb-3">
                                    <label for="foto_profil">Foto Profil</label>
                                    <input 
                                        type="file" 
                                        class="form-control @error('foto_profil') is-invalid @enderror" 
                                        id="foto_profil" 
                                        name="foto_profil" 
                                        accept="image/*"
                                    >
                                    @error('foto_profil')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    @if(isset($data) && $data->foto_profil)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/foto_pendeta/' . $data->foto_profil) }}" alt="Foto Profil" style="max-width: 150px;">
                                        </div>
                                    @endif
                                </div>

                                <!-- Keterangan -->
                                <div class="form-group mb-3">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea 
                                        class="form-control @error('keterangan') is-invalid @enderror" 
                                        id="keterangan" 
                                        name="keterangan" 
                                        rows="3" 
                                        placeholder="Tulis keterangan tambahan"
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
                                    <a href="{{ route('pendeta.index') }}" class="btn btn-secondary">
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
