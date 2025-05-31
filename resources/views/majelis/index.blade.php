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
                                :btnCreate="route('majelis.create')" 
                                :btnPrint="route('majelis.print')" 
                                :formAction="route('majelis.index')"
                            />

                            <!-- table-responsive start -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto Profil</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Jabatan</th>
                                        <th>Periode Jabatan</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($majelis as $key => $m)
                                        <tr>
                                            <th scope="row">{{ $i + $key + 1 }}</th>
                                            <td>
                                                @if ($m->foto_profil)
                                                    <img src="{{ asset($m->foto_profil) }}" alt="Foto Profil" width="50" height="50" style="object-fit: cover; border-radius: 50%;">
                                                @else
                                                    <span>-</span>
                                                @endif
                                            </td>
                                            <td>{{ $m->nama_lengkap }}</td>
                                            <td>{{ $m->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($m->tanggal_lahir)->format('d-m-Y') }}</td>
                                            <td>{{ $m->tempat_lahir }}</td>
                                            <td>{{ $m->jabatan }}</td>
                                            <td>{{ $m->periode_jabatan }}</td>
                                            <td>{{ $m->pendidikan_terakhir }}</td>
                                            <td>{{ $m->keterangan ?? '-' }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    {{-- <a href="{{ route('majelis.show', $m->id) }}" class="btn btn-sm btn-primary" title="Detail">
                                                        <i class="fa fa-eye"></i> Detail
                                                    </a> --}}

                                                    <a href="{{ route('majelis.edit', $m->id) }}" class="btn text-primary" title="Ubah">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="#" class="btn text-muted" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $m->id }}" title="Hapus Permanen">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <x-force-delete-modal 
                                            :id="$m->id" 
                                            :nama="$m->nama_lengkap" 
                                            :route="route('majelis.forceDelete', $m->id)" 
                                        />

                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">Tidak ada data majelis</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>

                                <div>
                                    {{ $majelis->links('pagination::bootstrap-5') }}
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
