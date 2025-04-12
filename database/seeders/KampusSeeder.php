<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kampus;

class KampusSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_kampus' => 'Universitas Papua',
                'keterangan' => 'Kampus negeri di wilayah Papua Barat.',
            ],
            [
                'nama_kampus' => 'Universitas Cenderawasih',
                'keterangan' => 'Kampus negeri terbesar di Papua.',
            ],
            [
                'nama_kampus' => 'Institut Teknologi Papua',
                'keterangan' => 'Institut yang fokus pada pengembangan teknologi dan sains.',
            ],
            [
                'nama_kampus' => 'STIE Port Numbay',
                'keterangan' => 'Sekolah Tinggi Ilmu Ekonomi di Jayapura.',
            ],
            [
                'nama_kampus' => 'Universitas Kristen Wamena',
                'keterangan' => 'Perguruan tinggi swasta di pegunungan tengah Papua.',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Kampus::create($item);
        }
    }
}
