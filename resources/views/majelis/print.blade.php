@extends('layouts.print')
@section('print_content')

    <h2 style="text-align: center; margin-bottom: 20px;">{{ $pageTitle ? $pageTitle : 'Cetak Data Majelis' }}</h2>

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
                                        </tr>


                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">Tidak ada data majelis</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>

    

@endsection
