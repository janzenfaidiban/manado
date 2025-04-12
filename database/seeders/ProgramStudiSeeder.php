<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramStudi;
use Illuminate\Support\Carbon;

class ProgramStudiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'fakultas_id' => 1,
                'nama_program_studi' => 'Teknik Informatika',
                'keterangan' => 'Program studi yang mempelajari tentang pemrograman dan pengembangan perangkat lunak.',
            ],
            [
                'fakultas_id' => 2,
                'nama_program_studi' => 'Sistem Informasi',
                'keterangan' => 'Fokus pada integrasi antara teknologi informasi dan bisnis.',
            ],
            [
                'fakultas_id' => 3,
                'nama_program_studi' => 'Akuntansi',
                'keterangan' => 'Pembelajaran tentang pencatatan dan pelaporan keuangan.',
            ],
            [
                'fakultas_id' => 4,
                'nama_program_studi' => 'Manajemen',
                'keterangan' => 'Mempelajari ilmu kepemimpinan dan pengelolaan bisnis.',
            ],
            [
                'fakultas_id' => 5,
                'nama_program_studi' => 'Teknik Sipil',
                'keterangan' => 'Berfokus pada perencanaan dan konstruksi bangunan serta infrastruktur.',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\ProgramStudi::create($item);
        }
    }
}
