<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            MenuTableSeeder::class,
            SubMenuTableSeeder::class,
            UsersTableSeeder::class,
            AksesTableSeeder::class,
            WebTableSeeder::class,
            JenisBarang::class,
            MerkBarang::class,
            SatuanBarang::class,
            BarangSeeder::class,

        ]);
    }
}
