<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Majelis;

class MajelisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_lengkap' => 'Andi Saputra',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1980-05-12',
                'tempat_lahir' => 'Jayapura',
                'lingkungan' => '1',
                'jabatan' => 'Ketua',
                'periode_jabatan' => '2022-2025',
                'pekerjaan' => 'PNS',
                'pendidikan_terakhir' => 'S1',
                'foto_profil' => 'andi.jpg',
                'keterangan' => 'Aktif dalam kegiatan sosial.'
            ],
            [
                'nama_lengkap' => 'Maria Yosefina',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1990-08-22',
                'tempat_lahir' => 'Sentani',
                'lingkungan' => '2',
                'jabatan' => 'Sekretaris',
                'periode_jabatan' => '2023-2026',
                'pekerjaan' => 'Guru',
                'pendidikan_terakhir' => 'S2',
                'foto_profil' => 'maria.jpg',
                'keterangan' => 'Bertanggung jawab atas dokumentasi.'
            ],
            [
                'nama_lengkap' => 'Yusuf Mandosir',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1975-02-14',
                'tempat_lahir' => 'Biak',
                'lingkungan' => '3',
                'jabatan' => 'Bendahara',
                'periode_jabatan' => '2021-2024',
                'pekerjaan' => 'Wiraswasta',
                'pendidikan_terakhir' => 'SMA/SMK',
                'foto_profil' => 'yusuf.jpg',
                'keterangan' => 'Mengelola keuangan majelis.'
            ],
            [
                'nama_lengkap' => 'Lina Karubaba',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1988-12-05',
                'tempat_lahir' => 'Manokwari',
                'lingkungan' => '4',
                'jabatan' => 'Anggota',
                'periode_jabatan' => '2023-2025',
                'pekerjaan' => 'Petani',
                'pendidikan_terakhir' => 'SMP',
                'foto_profil' => 'lina.jpg',
                'keterangan' => 'Aktif membantu dalam kegiatan lapangan.'
            ],
            [
                'nama_lengkap' => 'Fredi Nawipa',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1995-07-19',
                'tempat_lahir' => 'Wamena',
                'lingkungan' => '1',
                'jabatan' => 'Anggota',
                'periode_jabatan' => '2022-2025',
                'pekerjaan' => 'Mahasiswa',
                'pendidikan_terakhir' => 'S1',
                'foto_profil' => 'fredi.jpg',
                'keterangan' => 'Masih aktif kuliah sambil membantu organisasi.'
            ],
        ];

        foreach ($data as $item) {
            Majelis::create($item);
        }
    }
}
