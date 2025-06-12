@extends('layouts.print')
@section('print_content')

    <h2 style="text-align: center; margin-bottom: 20px;">{{ $pageTitle ? $pageTitle : 'Cetak Data Pendeta' }}</h2>

    <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto Profil</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($adminSupers as $key => $pendeta)
                                        <tr>
                                            <th scope="row">{{ $i + $key + 1 }}</th>
                                            <td>
                                                <img src="{{ $pendeta->foto_profil ? asset($pendeta->foto_profil) : 'assets/img/avatar-placeholder.png' }}" alt="Foto Profil" class="avatar-img rounded-circle" width="50">
                                            </td>
                                            <td>{{ $pendeta->nama_lengkap }}</td>
                                            <td>{{ $pendeta->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pendeta->tanggal_lahir)->format('d-m-Y') }}</td>
                                            <td>{{ $pendeta->tempat_lahir }}</td>
                                            <td>{{ $pendeta->pendidikan_terakhir }}</td>
                                            <td>{{ $pendeta->keterangan ?? '-' }}</td>
                                        </tr>


                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data pendeta</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
    

@endsection
