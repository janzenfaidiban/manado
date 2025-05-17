<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{

    /*
    | ==========================================
    | Data Admin Master
    |*/

    public function run(): void
    {

        // user role: admin super
        $admin = user::create(
            [
                'name' => 'Super Admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('admin@mail.com'),
                'avatar' => 'assets/img/admin1.png',
            ],
        );
        $admin->assignRole('admin');






        // user role:pendeta
        $pendeta = user::create(
            [
                'name' => 'Pendeta Jemaat',
                'username' => 'pendeta1',
                'email' => 'pendeta1@mail.com',
                'password' => bcrypt('pendeta1@mail.com'),
                'avatar' => 'assets/img/pendeta1.png',
            ],
        );
        $pendeta->assignRole('pendeta');






        // user role:majelis
        $majelis = user::create(
            [
                'name' => 'Majelis Jemaat',
                'username' => 'majelis1',
                'email' => 'majelis1@mail.com',
                'password' => bcrypt('majelis1@mail.com'),
                'avatar' => 'assets/img/majelis1.png',
            ],
        );
        $majelis->assignRole('majelis');





        // user role:jemaat
        $jemaat = user::create(
            [
                'name' => 'Anggota Jemaat',
                'username' => 'jemaat1',
                'email' => 'jemaat1@mail.com',
                'password' => bcrypt('jemaat1@mail.com'),
                'avatar' => 'assets/img/jemaat1.png',
            ],
        );
        $jemaat->assignRole('jemaat');




    }


}
