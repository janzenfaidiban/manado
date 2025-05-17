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
                                :btnCreate="route('jemaat.create')" 
                                :formAction="route('jemaat.index')"
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
                                    @forelse($jemaats as $key => $jemaat)
                                        <tr>
                                            <th scope="row">{{ $i + $key + 1 }}</th>
                                            <td>{{ $jemaat->nama_lengkap }}</td>
                                            <td>{{ $jemaat->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($jemaat->tanggal_lahir)->format('d-m-Y') }}</td>
                                            <td>{{ $jemaat->tempat_lahir }}</td>
                                            <td>{{ $jemaat->pendidikan_terakhir }}</td>
                                            <td>{{ $jemaat->keterangan ?? '-' }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <a href="{{ route('jemaat.show', $jemaat->id) }}" class="btn btn-sm btn-primary" title="Detail">
                                                        <i class="fa fa-eye"></i> Detail
                                                    </a>

                                                    <a href="{{ route('jemaat.edit', $jemaat->id) }}" class="btn btn-sm btn-warning" title="Ubah">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $jemaat->id }}" title="Hapus Permanen">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <x-force-delete-modal 
                                            :id="$jemaat->id" 
                                            :nama="$jemaat->nama_lengkap" 
                                            :route="route('jemaat.forceDelete', $jemaat->id)" 
                                        />

                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data jemaat</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>

                                <div>
                                    {{ $jemaats->links('pagination::bootstrap-5') }}
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
