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
                'user_nmlengkap' => 'rsc1',
                'user_nama' => 'rsc1',
                'user_email' => 'rsc1@gmail.com',
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
                'user_nmlengkap' => 'rsc2',
                'user_nama' => 'rsc2',
                'user_email' => 'rsc2@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Risk, System, and Compliance',
                'departemen' => 'System',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 9,
                'role_id' => '5',
                'user_nmlengkap' => 'rsc3',
                'user_nama' => 'rsc3',
                'user_email' => 'rsc3@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Risk, System, and Compliance',
                'departemen' => 'Compliance',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 10,
                'role_id' => '5',
                'user_nmlengkap' => 'bm1',
                'user_nama' => 'bm1',
                'user_email' => 'bm1@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Building Management',
                'departemen' => 'Building',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 11,
                'role_id' => '5',
                'user_nmlengkap' => 'bm2',
                'user_nama' => 'bm2',
                'user_email' => 'bm2@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Building Management',
                'departemen' => 'Management',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 12,
                'role_id' => '5',
                'user_nmlengkap' => 'bm3',
                'user_nama' => 'bm3',
                'user_email' => 'bm3@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Building Management',
                'departemen' => 'IT',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 13,
                'role_id' => '5',
                'user_nmlengkap' => 'cp1',
                'user_nama' => 'cp1',
                'user_email' => 'cp1@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Construction and Property',
                'departemen' => 'Construction',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 14,
                'role_id' => '5',
                'user_nmlengkap' => 'cp2',
                'user_nama' => 'cp2',
                'user_email' => 'cp2@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Construction and Property',
                'departemen' => 'Property',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 15,
                'role_id' => '5',
                'user_nmlengkap' => 'cp3',
                'user_nama' => 'cp3',
                'user_email' => 'cp3@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Construction and Property',
                'departemen' => 'Business',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 16,
                'role_id' => '5',
                'user_nmlengkap' => 'itbs1',
                'user_nama' => 'itbs1',
                'user_email' => 'itbs1@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'IT Business and Solution',
                'departemen' => 'IT',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 17,
                'role_id' => '5',
                'user_nmlengkap' => 'itbs2',
                'user_nama' => 'itbs2',
                'user_email' => 'itbs2@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'IT Business and Solution',
                'departemen' => 'Solution',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 18,
                'role_id' => '5',
                'user_nmlengkap' => 'itbs3',
                'user_nama' => 'itbs3',
                'user_email' => 'itbs3@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'IT Business and Solution',
                'departemen' => 'Technology',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 19,
                'role_id' => '5',
                'user_nmlengkap' => 'fa1',
                'user_nama' => 'fa1',
                'user_email' => 'fa1@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Finance and Accounting',
                'departemen' => 'Finance',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 20,
                'role_id' => '5',
                'user_nmlengkap' => 'fa2',
                'user_nama' => 'fa2',
                'user_email' => 'fa2@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Finance and Accounting',
                'departemen' => 'Accounting',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 21,
                'role_id' => '5',
                'user_nmlengkap' => 'fa3',
                'user_nama' => 'fa3',
                'user_email' => 'fa3@gmail.com',
                'nomor_hp' => '08123124',
                'divisi' => 'Finance and Accounting',
                'departemen' => 'Management',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 22,
                'role_id' => '5',
                'user_nmlengkap' => 'hc1',
                'user_nama' => 'hc1',
                'user_email' => 'hc1@gmail.com',
                'nomor_hp' => '08123125',
                'divisi' => 'Human Capital and General Affair',
                'departemen' => 'Recruitment',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 23,
                'role_id' => '5',
                'user_nmlengkap' => 'hc2',
                'user_nama' => 'hc2',
                'user_email' => 'hc2@gmail.com',
                'nomor_hp' => '08123126',
                'divisi' => 'Human Capital and General Affair',
                'departemen' => 'Training',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 24,
                'role_id' => '5',
                'user_nmlengkap' => 'hc3',
                'user_nama' => 'hc3',
                'user_email' => 'hc3@gmail.com',
                'nomor_hp' => '08123127',
                'divisi' => 'Human Capital and General Affair',
                'departemen' => 'Employee Relations',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 25,
                'role_id' => '5',
                'user_nmlengkap' => 'ia1',
                'user_nama' => 'ia1',
                'user_email' => 'ia1@gmail.com',
                'nomor_hp' => '08123128',
                'divisi' => 'Internal Audit',
                'departemen' => 'Internal',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 26,
                'role_id' => '5',
                'user_nmlengkap' => 'ia2',
                'user_nama' => 'ia2',
                'user_email' => 'ia2@gmail.com',
                'nomor_hp' => '08123129',
                'divisi' => 'Internal Audit',
                'departemen' => 'Audit',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 27,
                'role_id' => '5',
                'user_nmlengkap' => 'ia3',
                'user_nama' => 'ia3',
                'user_email' => 'ia3@gmail.com',
                'nomor_hp' => '08123130',
                'divisi' => 'Internal Audit',
                'departemen' => 'Control',
                'user_foto' => 'undraw_profile.svg',
                'user_password' => '25d55ad283aa400af464c76d713c07ad', // 12345678
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
