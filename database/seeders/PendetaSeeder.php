<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendeta;

class PendetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_lengkap' => 'Pendeta Yohanes Wanimbo',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1970-04-15',
                'tempat_lahir' => 'Wamena',
                'pendidikan_terakhir' => 'S2',
                'foto_profil' => 'yohanes.jpg',
                'keterangan' => 'Pendeta senior dengan pengalaman lebih dari 20 tahun.'
            ],
            [
                'nama_lengkap' => 'Pendeta Maria Loboya',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1982-09-10',
                'tempat_lahir' => 'Jayapura',
                'pendidikan_terakhir' => 'S1',
                'foto_profil' => 'maria.jpg',
                'keterangan' => 'Aktif dalam pelayanan kaum ibu dan anak-anak.'
            ],
            [
                'nama_lengkap' => 'Pendeta Samuel Yoku',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1975-11-25',
                'tempat_lahir' => 'Sentani',
                'pendidikan_terakhir' => 'S3',
                'foto_profil' => 'samuel.jpg',
                'keterangan' => 'Juga mengajar di sekolah teologi lokal.'
            ],
            [
                'nama_lengkap' => 'Pendeta Ruth Saroy',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1985-03-07',
                'tempat_lahir' => 'Manokwari',
                'pendidikan_terakhir' => 'S1',
                'foto_profil' => 'ruth.jpg',
                'keterangan' => 'Mengembangkan program pelayanan pemuda.'
            ],
            [
                'nama_lengkap' => 'Pendeta Lukas Mambrasar',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1968-06-30',
                'tempat_lahir' => 'Biak',
                'pendidikan_terakhir' => 'S2',
                'foto_profil' => 'lukas.jpg',
                'keterangan' => 'Melayani di wilayah pesisir selama lebih dari 15 tahun.'
            ],
        ];

        foreach ($data as $item) {
            Pendeta::create($item);
        }
    }
}
