<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_barang')->insert([
            [
                'barang_id' => 1,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '1', //Universal
                'barang_kode' => 'AC-01',
                'barang_nama' => 'BLOWER METAL AC',
                'barang_slug' => 'blower-metal-ac',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 2,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '1', //Universal
                'barang_kode' => 'AC-02',
                'barang_nama' => 'DUCT TAPE KARET',
                'barang_slug' => 'duct-tape-karet',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 3,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '2', // Saeki
                'barang_kode' => 'AC-03',
                'barang_nama' => 'DUCT TAPE ALUMUNIUM',
                'barang_slug' => 'duct-tape-alumunium',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 4,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '3', // Panasonic
                'barang_kode' => 'AC-04',
                'barang_nama' => 'EXHAUST FAN 10" FV25TGU5',
                'barang_slug' => 'exhaust-fan-10-fv25tgu5',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 5,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '3', // Panasonic
                'barang_kode' => 'AC-05',
                'barang_nama' => 'EXHAUST FAN 8" FV20TGU5',
                'barang_slug' => 'exhaust-fan-8-fv20tgu5',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 6,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '4', // Dupont
                'barang_kode' => 'AC-06',
                'barang_nama' => 'FREON R134A',
                'barang_slug' => 'freon-r134a',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 7,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '4', // Dupont
                'barang_kode' => 'AC-07',
                'barang_nama' => 'FREON R-22',
                'barang_slug' => 'freon-r-22',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 8,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '4', // Dupont
                'barang_kode' => 'AC-08',
                'barang_nama' => 'FREON R-32',
                'barang_slug' => 'freon-r-32',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 9,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '4', // Dupont
                'barang_kode' => 'AC-09',
                'barang_nama' => 'FREON R410A',
                'barang_slug' => 'freon-r410a',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 10,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '1', //Universal,
                'barang_kode' => 'AC-10',
                'barang_nama' => 'KARET BEARING',
                'barang_slug' => 'karet-bearing',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 11,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '1', //Universal,
                'barang_kode' => 'AC-11',
                'barang_nama' => 'PEMBERSIH CLEANER BESAR',
                'barang_slug' => 'pembersih-cleaner-besar',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 12,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '1', //Universal,
                'barang_kode' => 'AC-12',
                'barang_nama' => 'PEMBERSIH LOGAM - WD-40',
                'barang_slug' => 'pembersih-logam-wd-40',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // V-Belt Series
            [
                'barang_id' => 13,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => '1', //Universal,
                'barang_kode' => 'AC-13',
                'barang_nama' => 'V-BELT TYPE A-25',
                'barang_slug' => 'v-belt-type-a-25',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 14,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => 72, // Mitsubishi,
                'barang_kode' => 'AC-14',
                'barang_nama' => '  V-BELT TYPE A-43',
                'barang_slug' => 'v-belt-type-a-43',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 15,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => 72, // Mitsubishi,
                'barang_kode' => 'AC-15',
                'barang_nama' => 'V-BELT TYPE A-45',
                'barang_slug' => 'v-belt-type-a-45',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 16,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => 72, // Mitsubishi,
                'barang_kode' => 'AC-16',
                'barang_nama' => 'V-BELT TYPE A-49',
                'barang_slug' => 'v-belt-type-a-49',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 17,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => 72, // Mitsubishi,
                'barang_kode' => 'AC-17',
                'barang_nama' => 'V-BELT TYPE A-64',
                'barang_slug' => 'v-belt-type-a-64',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 18,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => 72, // Mitsubishi,
                'barang_kode' => 'AC-18',
                'barang_nama' => 'V-BELT TYPE A-73',
                'barang_slug' => 'v-belt-type-a-73',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 19,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => 5, // Bando
                'barang_kode' => 'AC-19',
                'barang_nama' => 'V-BELT TYPE B-94',
                'barang_slug' => 'v-belt-type-b-94',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 20,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => 72, // Mitsubishi,
                'barang_kode' => 'AC-20',
                'barang_nama' => 'V-BELT TYPE B-95',
                'barang_slug' => 'v-belt-type-b-95',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 21,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => 72, // Mitsubishi,
                'barang_kode' => 'AC-21',
                'barang_nama' => 'V-BELT TYPE B-96',
                'barang_slug' => 'v-belt-type-b-96',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 22,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => 72, // Mitsubishi,
                'barang_kode' => 'AC-22',
                'barang_nama' => 'V-BELT TYPE B-97',
                'barang_slug' => 'v-belt-type-b-97',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 23,
                'jenisbarang_id' => '12', // AC
                'satuan_id' => null,
                'merk_id' => 5, // Bando,
                'barang_kode' => 'AC-23',
                'barang_nama' => 'V-BELT TYPE B-145',
                'barang_slug' => 'v-belt-type-b-145',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Barang untuk kategori kebersihan (KB)

        ]);
    }
}
