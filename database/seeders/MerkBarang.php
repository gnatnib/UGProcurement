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
        'jenisbarang_id' => 12, // Perangkat Elektronik
        'created_at' => Carbon::parse('2022-11-15 18:14:09'),
        'updated_at' => Carbon::parse('2022-11-15 18:14:09'),
    ],
    [
        'merk_id' => 2,
        'merk_nama' => 'Lenovo',
        'merk_slug' => 'lenovo',
        'merk_keterangan' => null,
        'jenisbarang_id' => 12, // Perangkat Elektronik
        'created_at' => Carbon::parse('2022-11-15 18:14:33'),
        'updated_at' => Carbon::parse('2022-11-15 18:14:45'),
    ],
    [
        'merk_id' => 7,
        'merk_nama' => 'Steel',
        'merk_slug' => 'steel',
        'merk_keterangan' => null,
        'jenisbarang_id' => 13, // Furnitur
        'created_at' => Carbon::parse('2022-11-25 15:29:27'),
        'updated_at' => Carbon::parse('2022-11-25 15:29:27'),
    ],
    [
        'merk_id' => 8,
        'merk_nama' => 'Pilot',
        'merk_slug' => 'pilot',
        'merk_keterangan' => 'Pulpen berkualitas tinggi',
        'jenisbarang_id' => 11, // Alat Tulis Kantor
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ],
    [
        'merk_id' => 9,
        'merk_nama' => 'Samsung',
        'merk_slug' => 'samsung',
        'merk_keterangan' => null,
        'jenisbarang_id' => 12, // Perangkat Elektronik
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ],
    [
        'merk_id' => 10,
        'merk_nama' => 'IKEA',
        'merk_slug' => 'ikea',
        'merk_keterangan' => 'Furnitur modern',
        'jenisbarang_id' => 13, // Furnitur
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ],
    [
        'merk_id' => 11,
        'merk_nama' => 'CleanPro',
        'merk_slug' => 'cleanpro',
        'merk_keterangan' => 'Produk kebersihan premium',
        'jenisbarang_id' => 14, // Perlengkapan Kebersihan
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ],
    [
        'merk_id' => 12,
        'merk_nama' => 'Tupperware',
        'merk_slug' => 'tupperware',
        'merk_keterangan' => 'Peralatan dapur berkualitas',
        'jenisbarang_id' => 15, // Peralatan Pantry
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ],
]);

    
    }
}
