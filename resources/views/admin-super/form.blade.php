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
                                enctype="multipart/form-data"
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

                                

                            <!-- Upload Avatar -->
                            <div class="mb-3">

                                <label for="avatar" class="form-label">Avatar</label>
                                <!-- Preview Avatar -->
                                <div class="mb-2">
                                    <img id="preview-image" src="{{ isset($data) ? asset($data->user->avatar) : 'assets/img/avatar-placeholder.png' }}" alt="Preview avatar" width="150" class="img-thumbnail rounded-circle">
                                </div>

                                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" onchange="previewImage(event)">

                                <!-- Spinner Loading -->
                                <div id="loading-spinner" class="mt-2" style="display: none;">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
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
                                    @if(isset($data))
                                    <a href="{{ route('admin.show', $data->id) }}" class="btn">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    @endif
                                    <a href="{{ route('admin.index') }}" class="btn">
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




@push('scripts')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            var spinner = document.getElementById('loading-spinner');
            var imgElement = document.getElementById('preview-image');

            // Tampilkan spinner & sembunyikan gambar sementara
            spinner.style.display = 'block';
            imgElement.style.display = 'none';

            reader.onload = function(){
                setTimeout(function() { // Tunggu 1 detik sebelum menampilkan gambar
                    spinner.style.display = 'none';
                    imgElement.src = reader.result;
                    imgElement.style.display = 'block';
                }, 500);
            };

            reader.readAsDataURL(input.files[0]); // Baca file sebagai URL
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#dataTable tbody tr').each(function (index) {
                $(this).find('td:first').text(index + 1);
            });
        });
    </script>

    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>
@endpush