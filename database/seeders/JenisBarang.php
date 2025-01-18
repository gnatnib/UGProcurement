<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JenisBarang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_jenisbarang')->insert([
            [
                'jenisbarang_id' => 11,
                'jenisbarang_nama' => 'Elektronik',
                'jenisbarang_slug' => 'elektronik',
                'jenisbarang_keterangan' => null,
                'created_at' => Carbon::parse('2022-11-25 15:24:18'),
                'updated_at' => Carbon::parse('2022-11-25 15:25:39'),
            ],
            [
                'jenisbarang_id' => 12,
                'jenisbarang_nama' => 'Perangkat Komputer',
                'jenisbarang_slug' => 'perangkat-komputer',
                'jenisbarang_keterangan' => null,
                'created_at' => Carbon::parse('2022-11-25 15:26:15'),
                'updated_at' => Carbon::parse('2022-11-25 15:27:16'),
            ],
            [
                'jenisbarang_id' => 13,
                'jenisbarang_nama' => 'Besi',
                'jenisbarang_slug' => 'besi',
                'jenisbarang_keterangan' => null,
                'created_at' => Carbon::parse('2022-11-25 15:27:33'),
                'updated_at' => Carbon::parse('2022-11-25 15:27:33'),
            ],
        ]);
    }
}
