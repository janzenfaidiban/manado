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
                                :btnCreate="route('admin.create')" 
                                :formAction="route('admin.index')"
                            />

                            <!-- table-responsive start -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($adminSupers as $key => $adminSuper)
                                        <tr>
                                            <th scope="row">{{ $i + $key + 1 }}</th>
                                            <td>{{ $adminSuper->nama_lengkap }}</td>
                                            <td>{{ $adminSuper->no_hp }}</td>
                                            <td>{{ $adminSuper->email }}</td>
                                            <td>{{ $adminSuper->user->getRoleNames()->implode(', ') ?: '-' }}</td>
                                            <td>{{ $adminSuper->keterangan ?? '-' }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <a href="{{ route('admin.show', $adminSuper->id) }}" class="btn btn-sm btn-primary" title="Detail">
                                                        <i class="fa fa-eye"></i> Detail
                                                    </a>

                                                    <a href="{{ route('admin.edit', $adminSuper->id) }}" class="btn btn-sm btn-warning" title="Ubah">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#forceDeleteModal{{ $adminSuper->id }}" title="Hapus Permanen">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <x-force-delete-modal 
                                            :id="$adminSuper->id" 
                                            :nama="$adminSuper->nama_lengkap" 
                                            :route="route('admin.forceDelete', $adminSuper->id)" 
                                        />

                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data Admin Super</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>

                                <div>
                                    {{ $adminSupers->links('pagination::bootstrap-5') }}
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
