<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            RoleSeeder::class,
            UserSeeder::class,
            AdminSuperSeeder::class,
            PendetaSeeder::class,
            MajelisSeeder::class,
            JemaatSeeder::class,
        ]);


    }
}
