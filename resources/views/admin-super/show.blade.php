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

                            <!-- Tampilkan detail data -->

                            <div class="mb-3">
                                <label class="form-label"><strong>Nama Lengkap</strong></label>
                                <p>{{ $data->nama_lengkap }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>No HP</strong></label>
                                <p>{{ $data->no_hp }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Email</strong></label>
                                <p>{{ $data->email }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Username</strong></label>
                                <p>{{ $data->user->username ?? '-' }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Keterangan</strong></label>
                                <p>{{ $data->keterangan ?? '-' }}</p>
                            </div>

                            <hr class="my-4">

                            <div class="form-group">
                                <a href="{{ route('admin.edit', $data->id) }}" class="btn text-primary">
                                    <i class="fa fa-edit"></i> Ubah
                                </a>
                                <a href="{{ route('admin.index') }}" class="btn">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@stop
