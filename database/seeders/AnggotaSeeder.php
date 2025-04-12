<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'program_studi_id' => 1,
                'tanggal_pendaftaran' => Carbon::now(),
                'nama_lengkap' => 'Andi Saputra',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Jayapura',
                'tanggal_lahir' => '1999-05-14',
                'agama' => 'Islam',
                'alamat_tinggal' => 'Jl. Merdeka No. 10, Jayapura',
                'no_hp' => '081234567890',
                'email' => 'andi@example.com',
                'kampus' => 'Universitas Cenderawasih',
                'fakultas' => 'Ilmu Komputer',
                'program_studi' => 'Informatika',
                'foto' => null,
                'kpm' => null,
                'nim' => '190001',
                'ktp' => null,
                'status_anggota' => 'aktif',
                'alumni' => false,
                'keterangan' => 'Aktif dalam organisasi',
            ],
            [
                'id' => 2,
                'program_studi_id' => 2,
                'tanggal_pendaftaran' => Carbon::now(),
                'nama_lengkap' => 'Siti Nurhaliza',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Manokwari',
                'tanggal_lahir' => '2000-01-22',
                'agama' => 'Kristen',
                'alamat_tinggal' => 'Jl. Pendidikan No. 5, Manokwari',
                'no_hp' => '082345678901',
                'email' => 'siti@example.com',
                'kampus' => 'Universitas Papua',
                'fakultas' => 'Ekonomi',
                'program_studi' => 'Akuntansi',
                'foto' => null,
                'kpm' => null,
                'nim' => '200002',
                'ktp' => null,
                'status_anggota' => 'pending',
                'alumni' => false,
                'keterangan' => null,
            ],
            [
                'id' => 3,
                'program_studi_id' => 3,
                'tanggal_pendaftaran' => Carbon::now(),
                'nama_lengkap' => 'Joko Santoso',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Sorong',
                'tanggal_lahir' => '1998-08-08',
                'agama' => 'Katolik',
                'alamat_tinggal' => 'Jl. Bahagia No. 8, Sorong',
                'no_hp' => '083456789012',
                'email' => 'joko@example.com',
                'kampus' => 'Universitas Muhammadiyah Sorong',
                'fakultas' => 'Teknik',
                'program_studi' => 'Teknik Sipil',
                'foto' => null,
                'kpm' => null,
                'nim' => '180003',
                'ktp' => null,
                'status_anggota' => 'nonaktif',
                'alumni' => true,
                'keterangan' => 'Sudah lulus',
            ],
            [
                'id' => 4,
                'program_studi_id' => 2,
                'tanggal_pendaftaran' => Carbon::now(),
                'nama_lengkap' => 'Maria Goreti',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Timika',
                'tanggal_lahir' => '2001-12-01',
                'agama' => 'Katolik',
                'alamat_tinggal' => 'Jl. Kemerdekaan No. 11, Timika',
                'no_hp' => '084567890123',
                'email' => 'maria@example.com',
                'kampus' => 'STIE Timika',
                'fakultas' => 'Manajemen',
                'program_studi' => 'Manajemen Bisnis',
                'foto' => null,
                'kpm' => null,
                'nim' => '210004',
                'ktp' => null,
                'status_anggota' => 'aktif',
                'alumni' => false,
                'keterangan' => 'Peserta baru',
            ],
            [
                'id' => 5,
                'program_studi_id' => 1,
                'tanggal_pendaftaran' => Carbon::now(),
                'nama_lengkap' => 'Rian Wibowo',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Nabire',
                'tanggal_lahir' => '2002-03-30',
                'agama' => 'Islam',
                'alamat_tinggal' => 'Jl. Damai No. 20, Nabire',
                'no_hp' => '085678901234',
                'email' => 'rian@example.com',
                'kampus' => 'Politeknik Nabire',
                'fakultas' => 'Teknik Elektro',
                'program_studi' => 'Teknik Listrik',
                'foto' => null,
                'kpm' => null,
                'nim' => '220005',
                'ktp' => null,
                'status_anggota' => 'pending',
                'alumni' => false,
                'keterangan' => null,
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Anggota::create($item);
        }
    }
}
