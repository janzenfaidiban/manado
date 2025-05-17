@extends('layouts.app')
@section('content')

<!-- main content -->
<div class="container">
    <div class="page-inner">

        <x-page-header 
            :pageTitle="$pageTitle" 
            :pageDescription="$pageDescription" 
        />

        <div class="page-category">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <x-alert />

                            <!-- toolbar -->
                            <x-admin.toolbar 
                                :btnCreate="route('pendeta.create')" 
                                :formAction="route('pendeta.index')"
                            />

                            <!-- table-responsive start -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($pendetas as $key => $pendeta)
                                        <tr>
                                            <th scope="row">{{ $i + $key + 1 }}</th>
                                            <td>{{ $pendeta->nama_lengkap }}</td>
                                            <td>{{ $pendeta->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pendeta->tanggal_lahir)->format('d-m-Y') }}</td>
                                            <td>{{ $pendeta->tempat_lahir }}</td>
                                            <td>{{ $pendeta->pendidikan_terakhir }}</td>
                                            <td>{{ $pendeta->keterangan ?? '-' }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <a href="{{ route('pendeta.show', $pendeta->id) }}" class="btn btn-sm btn-primary" title="Detail">
                                                        <i class="fa fa-eye"></i> Detail
                                                    </a>

                                                    <a href="{{ route('pendeta.edit', $pendeta->id) }}" class="btn btn-sm btn-warning" title="Ubah">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $pendeta->id }}" title="Hapus Permanen">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <x-force-delete-modal 
                                            :id="$pendeta->id" 
                                            :nama="$pendeta->nama_lengkap" 
                                            :route="route('pendeta.forceDelete', $pendeta->id)" 
                                        />

                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data pendeta</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>

                                <div>
                                    {{ $pendetas->links('pagination::bootstrap-5') }}
                                </div>

                            </div>
                            <!-- table-responsive end -->

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- end page-inner -->
</div>
<!-- end container -->

@stop
