<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // role: admin super
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
            'desc' => 'Akun utama sebagai pengelola sistem secara keseluruhan termasuk mengelola data dasar dan data anggota.',
        ]);

        // role: pendeta
        Role::create([
            'name' => 'pendeta',
            'guard_name' => 'web',
            'desc' => 'Akun dengan level Pendeta',
        ]);
        
        // role: majelis
        Role::create([
            'name' => 'majelis',
            'guard_name' => 'web',
            'desc' => 'Akun dengan level Majelis',
        ]);

        // role: jemaat
        Role::create([
            'name' => 'jemaat',
            'guard_name' => 'web',
            'desc' => 'Jemaat adalah anggota gereja yang terdaftar dan bisa melihat data-data yang ada di dalam sistem.',
        ]);
        
    }
}
