<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_user')->insert([
            [
                'user_id' => 1,
                'role_id' => '1',
                'user_nmlengkap' => 'Super Administrator',
                'user_nama' => 'superadmin',
                'user_email' => 'superadmin@gmail.com',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 2,
                'role_id' => '2',
                'user_nmlengkap' => 'Administrator',
                'user_nama' => 'admin',
                'user_email' => 'admin@gmail.com',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 3,
                'role_id' => '3',
                'user_nmlengkap' => 'Operator',
                'user_nama' => 'operator',
                'user_email' => 'operator@gmail.com',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 4,
                'role_id' => '4',
                'user_nmlengkap' => 'Manajer',
                'user_nama' => 'manajer',
                'user_email' => 'manajer@gmail.com',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
