<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminSuper;

class AdminSuperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'nama_lengkap' => 'Andi Saputra',
                'no_hp' => '081234567890',
                'email' => 'andi@example.com',
                'keterangan' => 'Admin utama sistem informasi.'
            ],
            [
                'user_id' => 2,
                'nama_lengkap' => 'Budi Hartono',
                'no_hp' => '082233445566',
                'email' => 'budi@example.com',
                'keterangan' => 'Bertanggung jawab atas manajemen data.'
            ],
            [
                'user_id' => 3,
                'nama_lengkap' => 'Citra Dewi',
                'no_hp' => '083144556677',
                'email' => 'citra@example.com',
                'keterangan' => 'Menangani bagian keamanan akun.'
            ],
            [
                'user_id' => 4,
                'nama_lengkap' => 'Dimas Pratama',
                'no_hp' => '085177889900',
                'email' => 'dimas@example.com',
                'keterangan' => 'Monitoring server dan backup.'
            ],
            [
                'user_id' => 5,
                'nama_lengkap' => 'Eka Lestari',
                'no_hp' => '081345678912',
                'email' => 'eka@example.com',
                'keterangan' => 'Bertanggung jawab atas pengembangan fitur baru.'
            ],
        ];

        foreach ($data as $item) {
            AdminSuper::create($item);
        }
    }
}
