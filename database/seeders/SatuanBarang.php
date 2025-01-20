<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SatuanBarang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_satuan')->insert([
            [
                'satuan_id' => 1,
                'satuan_nama' => 'Kg',
                'satuan_slug' => 'kg',
                'satuan_keterangan' => 'Kilogram',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 2,
                'satuan_nama' => 'G',
                'satuan_slug' => 'g',
                'satuan_keterangan' => 'Gram',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 5,
                'satuan_nama' => 'Pcs',
                'satuan_slug' => 'pcs',
                'satuan_keterangan' => '1 Buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 7,
                'satuan_nama' => 'Qty',
                'satuan_slug' => 'qty',
                'satuan_keterangan' => 'Quantity',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 8,
                'satuan_nama' => 'Lusin',
                'satuan_slug' => 'lusin',
                'satuan_keterangan' => '1 Lusin = 12 Unit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 9,
                'satuan_nama' => 'Ltr',
                'satuan_slug' => 'ltr',
                'satuan_keterangan' => 'Liter',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 10,
                'satuan_nama' => 'Cm',
                'satuan_slug' => 'cm',
                'satuan_keterangan' => 'Panjang dalam Centimeter',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 11,
                'satuan_nama' => 'Meter',
                'satuan_slug' => 'meter',
                'satuan_keterangan' => 'Panjang dalam Meter',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 12,
                'satuan_nama' => 'Pack',
                'satuan_slug' => 'pack',
                'satuan_keterangan' => '1 Pack',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 13,
                'satuan_nama' => 'Rim',
                'satuan_slug' => 'rim',
                'satuan_keterangan' => '1 Rim = 500 Lembar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 14,
                'satuan_nama' => 'Kodi',
                'satuan_slug' => 'kodi',
                'satuan_keterangan' => '1 Kodi = 20 Unit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'satuan_id' => 15,
                'satuan_nama' => 'Unit',
                'satuan_slug' => 'unit',
                'satuan_keterangan' => 'Satuan unit untuk barang elektronik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
