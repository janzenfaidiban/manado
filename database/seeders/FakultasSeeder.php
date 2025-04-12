<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fakultas;

class FakultasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Ilmu Komputer',
                'keterangan' => 'Menyediakan program studi di bidang teknologi informasi.',
            ],
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'keterangan' => 'Berfokus pada ilmu manajemen dan akuntansi.',
            ],
            [
                'kampus_id' => 2,
                'nama_fakultas' => 'Fakultas Teknik',
                'keterangan' => 'Menyelenggarakan program teknik sipil, elektro, mesin, dan lainnya.',
            ],
            [
                'kampus_id' => 2,
                'nama_fakultas' => 'Fakultas Ilmu Sosial dan Politik',
                'keterangan' => 'Menawarkan pendidikan di bidang administrasi dan politik.',
            ],
            [
                'kampus_id' => 3,
                'nama_fakultas' => 'Fakultas Keguruan dan Ilmu Pendidikan',
                'keterangan' => 'Mencetak tenaga pendidik profesional.',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Fakultas::create($item);
        }
    }
}
