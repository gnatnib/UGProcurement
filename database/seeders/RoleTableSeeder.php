<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_role')->insert([
            [
                'role_id' => 1,
                'role_title' => 'Super Admin',
                'role_slug' => 'super-admin',
                'role_desc' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 2,
                'role_title' => 'Admin',
                'role_slug' => 'admin',
                'role_desc' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 3,
                'role_title' => 'Operator',
                'role_slug' => 'operator',
                'role_desc' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 4,
                'role_title' => 'Manajer',
                'role_slug' => 'manajer',
                'role_desc' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 5,
                'role_title' => 'User',
                'role_slug' => 'user',
                'role_desc' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
