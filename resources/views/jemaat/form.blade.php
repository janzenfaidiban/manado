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
                                action="{{ isset($data) ? route('jemaat.update', $data->id) : route('jemaat.store') }}" 
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
                                        value="{{ old('tanggal_lahir', isset($data) && $data->tanggal_lahir ? \Carbon\Carbon::parse($data->tanggal_lahir)->format('Y-m-d') : '') }}" 
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
                                            $options = ['SD', 'SMP', 'SMA/SMK', 'S1', 'S2', 'S3', 'Lainnya'];
                                        @endphp
                                        @foreach($options as $opt)
                                            <option value="{{ $opt }}" {{ old('pendidikan_terakhir', $data->pendidikan_terakhir ?? '') == $opt ? 'selected' : '' }}>
                                                {{ $opt }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan_terakhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pekerjaan -->
                                <div class="form-group mb-3">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <select 
                                        class="form-select @error('pekerjaan') is-invalid @enderror" 
                                        id="pekerjaan" 
                                        name="pekerjaan" 
                                        required
                                    >
                                        <option value="">Pilih Pekerjaan</option>
                                        @php
                                            $pekerjaanOptions = ['Pelajar', 'Mahasiswa', 'PNS', 'TNI', 'POLRI', 'Guru', 'Petani', 'Wiraswasta', 'Lainnya'];
                                        @endphp
                                        @foreach($pekerjaanOptions as $opt)
                                            <option value="{{ $opt }}" {{ old('pekerjaan', $data->pekerjaan ?? '') == $opt ? 'selected' : '' }}>
                                                {{ $opt }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Lingkungan -->
                                <div class="form-group mb-3">
                                    <label for="lingkungan">Lingkungan</label>
                                    <select 
                                        class="form-select @error('lingkungan') is-invalid @enderror" 
                                        id="lingkungan" 
                                        name="lingkungan" 
                                        required
                                    >
                                        <option value="">Pilih Lingkungan</option>
                                        @foreach(['Lingkungan 1', 'Lingkungan 2', 'Lingkungan 3', 'Lingkungan 4'] as $lingkungan)
                                            <option value="{{ $lingkungan }}" {{ old('lingkungan', $data->lingkungan ?? '') == $lingkungan ? 'selected' : '' }}>
                                                {{ $lingkungan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('lingkungan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status Baptis -->
                                <div class="form-group mb-3">
                                    <label for="status_baptis">Status Baptis</label>
                                    <select 
                                        class="form-select @error('status_baptis') is-invalid @enderror" 
                                        id="status_baptis" 
                                        name="status_baptis" 
                                        required
                                    >
                                        <option value="">Pilih Status Baptis</option>
                                        @foreach(['Sudah', 'Belum'] as $status_baptis)
                                            <option value="{{ $status_baptis }}" {{ old('status_baptis', $data->status_baptis ?? '') == $status_baptis ? 'selected' : '' }}>
                                                {{ $status_baptis }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status_baptis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Keterangan -->
                                <div class="form-group mb-3">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea 
                                        class="form-control @error('keterangan') is-invalid @enderror" 
                                        id="keterangan" 
                                        name="keterangan" 
                                        placeholder="Masukkan keterangan"
                                        required
                                    >{{ old('keterangan', $data->keterangan ?? '') }}</textarea>
                                    <small class="form-text text-muted">Masukkan keterangan tambahan di sini.</small>
                                    @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr class="my-4">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                    <a href="{{ route('jemaat.index') }}" class="btn btn-secondary">
                                        <i class="fa fa-times-circle"></i> Tutup
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
