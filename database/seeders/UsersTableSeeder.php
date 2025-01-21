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
                'nomor_hp' => '0811111111',
                'divisi' => 'Management',
                'departemen' => 'IT',
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
                'nomor_hp' => '0812222222',
                'divisi' => 'Administration',
                'departemen' => 'HR',
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
                'nomor_hp' => '0813333333',
                'divisi' => 'Operations',
                'departemen' => 'Logistics',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 4,
                'role_id' => '4',
                'user_nmlengkap' => 'GMRSCR',
                'user_nama' => 'GMRSC',
                'user_email' => 'GMRSCR@gmail.com',
                'nomor_hp' => '0814444444',
                'divisi' => 'Risk, System, and Compliance',
                'departemen' => 'Risk',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 5,
                'role_id' => '4',
                'user_nmlengkap' => 'GMRSCS',
                'user_nama' => 'GMRSCS',
                'user_email' => 'GMRSCS@gmail.com',
                'nomor_hp' => '0814444444',
                'divisi' => 'Risk, System, and Compliance',
                'departemen' => 'System',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 6,
                'role_id' => '4',
                'user_nmlengkap' => 'GMRSCC',
                'user_nama' => 'GMRSCC',
                'user_email' => 'GMRSCC@gmail.com',
                'nomor_hp' => '0814444444',
                'divisi' => 'Risk, System, and Compliance',
                'departemen' => 'Compliance',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 7,
                'role_id' => '5',
                'user_nmlengkap' => 'User',
                'user_nama' => 'user',
                'user_email' => 'user@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Risk, System, and Compliance',
                'departemen' => 'Risk',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 8,
                'role_id' => '5',
                'user_nmlengkap' => 'User2',
                'user_nama' => 'user2',
                'user_email' => 'user2@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Risk, System, and Compliance',
                'departemen' => 'System',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
