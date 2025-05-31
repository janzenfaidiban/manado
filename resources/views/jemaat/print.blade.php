@extends('layouts.print')
@section('print_content')

    <h2 style="text-align: center; margin-bottom: 20px;">{{ $pageTitle ? $pageTitle : 'Cetak Data Majelis' }}</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Pendidikan Terakhir</th>
                <th>Pekerjaan</th>
                <th>Status Baptis</th>
                <th>Lingkungan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jemaats as $jemaat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jemaat->nama_lengkap }}</td>
                    <td>{{ $jemaat->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ \Carbon\Carbon::parse($jemaat->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $jemaat->tempat_lahir }}</td>
                    <td>{{ $jemaat->pendidikan_terakhir }}</td>
                    <td>{{ $jemaat->pekerjaan }}</td>
                    <td>{{ $jemaat->status_baptis }}</td>
                    <td>{{ $jemaat->lingkungan }}</td>
                    <td>{{ $jemaat->keterangan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">Tidak ada data jemaat</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
