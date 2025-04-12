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

                                    <!-- alert -->
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Berhasil</strong> Data telah ditambahkan ke dalam database.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                    <!-- toolbar -->
                                    <x-admin.toolbar 
                                        :formAction="Request::segment(3) == 'trash' 
                                            ? route('admin.anggota.trash') 
                                            : route('admin.anggota.semua')"
                                    />

                                    <!-- table-responsieve start -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tanggal Pendaftaran</th>
                                                    <th>Foto</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>NIM</th>
                                                    <th>KPM</th>
                                                    <th>Kampus</th>
                                                    <th>Fakultas</th>
                                                    <th>Program Studi</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tempat, Tanggal Lahir</th>
                                                    <th>Agama</th>
                                                    <th>Alamat Tinggal</th>
                                                    <th>Nomor HP</th>
                                                    <th>Email</th>
                                                    <th>Status Anggota</th>
                                                    <th>Alumni</th>
                                                    <th>Keterangan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($datas as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ $i + $key + 1 }}</th>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pendaftaran)->translatedFormat('l, d F Y') }}</td>
                                                    <td>
                                                        <div class="avatar avatar-xl">
                                                            <img src="{{ asset('assets/img/sacode-profile-1.png') }}" alt="foto" class="w-100 rounded-circle">
                                                        </div>
                                                    </td>
                                                    <td>{!! $item->nama_lengkap !!}</td>
                                                    <td>{!! $item->nim !!}</td>
                                                    <td>{!! $item->kpm !!}</td>
                                                    <td>{!! $item->kampus_id !!}</td>
                                                    <td>Fakultas</td>
                                                    <td>Program Studi</td>
                                                    <td>{!! $item->jenis_kelamin !!}</td>
                                                    <td>{{ $item->tempat_lahir }}, {{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                                    <td>{!! $item->agama !!}</td>
                                                    <td>{!! $item->alamat_tinggal !!}</td>
                                                    <td>{!! $item->no_hp !!}</td>
                                                    <td>{!! $item->email !!}</td>
                                                    <td>{!! $item->status_anggota !!}</td>
                                                    <td>{!! $item->alumni !!}</td>
                                                    <td>{!! $item->keterangan !!}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="btn btn-sm" title="Detail">
                                                                <i class="fa fa-eye"></i> 
                                                            </a>
                                                            <a href="#" class="btn btn-sm" title="Ubah">
                                                                <i class="fa fa-edit"></i> 
                                                            </a>
                                                            <a href="#" class="btn btn-sm" title="Hapus">
                                                                <i class="fa fa-trash"></i> 
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty 
                                                <p>Tidak ada data</p>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <div>
                                            {{ $datas->links('pagination::bootstrap-5') }}
                                        </div>

                                    </div>
                                    <!-- table-responsieve end -->
                                
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
