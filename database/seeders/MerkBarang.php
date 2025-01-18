<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class MerkBarang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tbl_merk')->insert([
            [
                'merk_id' => 1,
                'merk_nama' => 'Huawei',
                'merk_slug' => 'huawei',
                'merk_keterangan' => null,
                'created_at' => Carbon::parse('2022-11-15 18:14:09'),
                'updated_at' => Carbon::parse('2022-11-15 18:14:09'),
            ],
            [
                'merk_id' => 2,
                'merk_nama' => 'Lenovo',
                'merk_slug' => 'lenovo',
                'merk_keterangan' => null,
                'created_at' => Carbon::parse('2022-11-15 18:14:33'),
                'updated_at' => Carbon::parse('2022-11-15 18:14:45'),
            ],
            [
                'merk_id' => 7,
                'merk_nama' => 'Steel',
                'merk_slug' => 'steel',
                'merk_keterangan' => null,
                'created_at' => Carbon::parse('2022-11-25 15:29:27'),
                'updated_at' => Carbon::parse('2022-11-25 15:29:27'),
            ],
        ]);
    
    }
}
