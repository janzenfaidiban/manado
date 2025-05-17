<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jemaat;

class JemaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 16,
                'nama_lengkap' => 'Yohanes Karel',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1990-01-15',
                'tempat_lahir' => 'Jayapura',
                'pendidikan_terakhir' => 'SMA/SMK',
                'pekerjaan' => 'Guru',
                'lingkungan' => '1',
            ],
            [
                'user_id' => 17,
                'nama_lengkap' => 'Maria Magdalena',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1995-04-10',
                'tempat_lahir' => 'Manokwari',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'PNS',
                'lingkungan' => '2',
            ],
            [
                'user_id' => 18,
                'nama_lengkap' => 'Samuel Latu',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2001-08-20',
                'tempat_lahir' => 'Sorong',
                'pendidikan_terakhir' => 'SMP',
                'pekerjaan' => 'Pelajar',
                'lingkungan' => '3',
            ],
            [
                'user_id' => 19,
                'nama_lengkap' => 'Ruth Neles',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1988-06-30',
                'tempat_lahir' => 'Biak',
                'pendidikan_terakhir' => 'S2',
                'pekerjaan' => 'Wiraswasta',
                'lingkungan' => '1',
            ],
            [
                'user_id' => 20,
                'nama_lengkap' => 'Markus Tandi',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1980-12-01',
                'tempat_lahir' => 'Merauke',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'Petani',
                'lingkungan' => '4',
            ],
            [
                'user_id' => 21,
                'nama_lengkap' => 'Ester Rumbiak',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1992-03-03',
                'tempat_lahir' => 'Fakfak',
                'pendidikan_terakhir' => 'SMA/SMK',
                'pekerjaan' => 'Mahasiswa',
                'lingkungan' => '2',
            ],
            [
                'user_id' => 22,
                'nama_lengkap' => 'David Ayorbaba',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1999-11-11',
                'tempat_lahir' => 'Wamena',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'PNS',
                'lingkungan' => '3',
            ],
            [
                'user_id' => 23,
                'nama_lengkap' => 'Debora Wambrauw',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1996-07-07',
                'tempat_lahir' => 'Serui',
                'pendidikan_terakhir' => 'SMA/SMK',
                'pekerjaan' => 'Lainnya',
                'lingkungan' => '4',
            ],
            [
                'user_id' => 24,
                'nama_lengkap' => 'Nathan Mandowen',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1993-02-18',
                'tempat_lahir' => 'Nabire',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'TNI',
                'lingkungan' => '1',
            ],
            [
                'user_id' => 25,
                'nama_lengkap' => 'Salome Tuharea',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1985-05-25',
                'tempat_lahir' => 'Ambon',
                'pendidikan_terakhir' => 'S2',
                'pekerjaan' => 'POLRI',
                'lingkungan' => '2',
            ],
            [
                'user_id' => 26,
                'nama_lengkap' => 'Thomas Wenda',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2000-09-09',
                'tempat_lahir' => 'Dekai',
                'pendidikan_terakhir' => 'SMP',
                'pekerjaan' => 'Pelajar',
                'lingkungan' => '3',
            ],
            [
                'user_id' => 27,
                'nama_lengkap' => 'Veronika Hanebora',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1994-10-14',
                'tempat_lahir' => 'Enarotali',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'Guru',
                'lingkungan' => '4',
            ],
            [
                'user_id' => 28,
                'nama_lengkap' => 'Lukas Kawer',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1991-04-22',
                'tempat_lahir' => 'Sentani',
                'pendidikan_terakhir' => 'S3',
                'pekerjaan' => 'Wiraswasta',
                'lingkungan' => '1',
            ],
            [
                'user_id' => 29,
                'nama_lengkap' => 'Elisabeth Uropmabin',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1982-08-08',
                'tempat_lahir' => 'Oksibil',
                'pendidikan_terakhir' => 'SMA/SMK',
                'pekerjaan' => 'Petani',
                'lingkungan' => '2',
            ],
            [
                'user_id' => 30,
                'nama_lengkap' => 'Daniel Yikwa',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1997-12-17',
                'tempat_lahir' => 'Kurima',
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'Mahasiswa',
                'lingkungan' => '3',
            ],
        ];

        foreach ($data as $item) {
            Jemaat::create($item);
        }
    }
}
