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
            [
                'barang_id' => 24,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-01',
                'barang_nama' => 'EMBER PLASTIK KECIL',
                'barang_slug' => 'ember-plastik-kecil',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 25,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-02',
                'barang_nama' => 'GAYUNG PLASTIK',
                'barang_slug' => 'gayung-plastik',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 26,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-03',
                'barang_nama' => 'JELIGEN 1 LITER',
                'barang_slug' => 'jeligen-1-liter',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 27,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-04',
                'barang_nama' => 'JELIGEN 5 LITER',
                'barang_slug' => 'jeligen-5-liter',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 28,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-05',
                'barang_nama' => 'KAIN LAP MICROFIBER',
                'barang_slug' => 'kain-lap-microfiber',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 29,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-06',
                'barang_nama' => 'KAIN LOBBY DUSTER',
                'barang_slug' => 'kain-lobby-duster',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 30,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-07',
                'barang_nama' => 'KAIN MAJUN',
                'barang_slug' => 'kain-majun',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 31,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-08',
                'barang_nama' => 'KAIN MOP PEL',
                'barang_slug' => 'kain-mop-pel',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 32,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-09',
                'barang_nama' => 'KAIN PEL BIRU',
                'barang_slug' => 'kain-pel-biru',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 33,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-10',
                'barang_nama' => 'KAIN PLANEL',
                'barang_slug' => 'kain-planel',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 34,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '7', // Loco
                'barang_kode' => 'KB-11',
                'barang_nama' => 'KANTONG PLASTIK KRESEK PUTIH',
                'barang_slug' => 'kantong-plastik-kresek-putih',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 35,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '8', // Banteng
                'barang_kode' => 'KB-12',
                'barang_nama' => 'PLASTIK SAMPAH HITAM UK.90x120',
                'barang_slug' => 'plastik-sampah-hitam-uk-90x120',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 36,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-13',
                'barang_nama' => 'KANTONG PLASTIKSAMPAH HITAM UK.60x100',
                'barang_slug' => 'kantong-plastiksampah-hitam-uk-60x100',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 37,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-14',
                'barang_nama' => 'LAP HANDUK',
                'barang_slug' => 'lap-handuk',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 38,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '9', // Champion
                'barang_kode' => 'KB-15',
                'barang_nama' => 'LAP KANEBO',
                'barang_slug' => 'lap-kanebo',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 39,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '10', // Ansel
                'barang_kode' => 'KB-16',
                'barang_nama' => 'SARUNG TANGAN KARET',
                'barang_slug' => 'sarung-tangan-karet-ansel',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 40,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '11', // Heron
                'barang_kode' => 'KB-17',
                'barang_nama' => 'SARUNG TANGAN KAIN',
                'barang_slug' => 'sarung-tangan-kain',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 41,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '12', // Kenmaster
                'barang_kode' => 'KB-18',
                'barang_nama' => 'SARUNG TANGAN KARET',
                'barang_slug' => 'sarung-tangan-karet-kenmaster',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 42,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-19',
                'barang_nama' => 'SLANG POMPA',
                'barang_slug' => 'slang-pompa',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 43,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '13', // Star
                'barang_kode' => 'KB-20',
                'barang_nama' => 'TEMPAT SAMPAH TUTUP INJAK SEDANG',
                'barang_slug' => 'tempat-sampah-tutup-injak-sedang',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 44,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-21',
                'barang_nama' => 'TEMPAT SAMPAH TUTUP MANUAL BESAR',
                'barang_slug' => 'tempat-sampah-tutup-manual-besar',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 45,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '14', // Chic
                'barang_kode' => 'KB-22',
                'barang_nama' => 'TEMPAT SAMPAH TUTUP INJAK',
                'barang_slug' => 'tempat-sampah-tutup-injak',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 46,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '13', // Star
                'barang_kode' => 'KB-23',
                'barang_nama' => 'TEMPAT SAMPAH TUTUP GOYANG BESAR',
                'barang_slug' => 'tempat-sampah-tutup-goyang-besar',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 47,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '13', // Star
                'barang_kode' => 'KB-24',
                'barang_nama' => 'TEMPAT SAMPAH TUTUP GOYANG KECIL',
                'barang_slug' => 'tempat-sampah-tutup-goyang-kecil',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 48,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '13', // Star
                'barang_kode' => 'KB-25',
                'barang_nama' => 'TEMPAT SAMPAH TUTUP GOYANG SEDANG',
                'barang_slug' => 'tempat-sampah-tutup-goyang-sedang',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 49,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-26',
                'barang_nama' => 'MASKER',
                'barang_slug' => 'masker',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 50,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '15', // Otsu
                'barang_kode' => 'KB-27',
                'barang_nama' => 'SIKAT CLOSET BULAT',
                'barang_slug' => 'sikat-closet-bulat',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 51,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-28',
                'barang_nama' => 'POMPA CLOSET / KOP',
                'barang_slug' => 'pompa-closet-kop',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 52,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-29',
                'barang_nama' => 'KEMOCENG',
                'barang_slug' => 'kemoceng',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 53,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '16', // Nagoya
                'barang_kode' => 'KB-30',
                'barang_nama' => 'SAPU LANGIT2 /RAK BOLL',
                'barang_slug' => 'sapu-langit2-rak-boll',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 54,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-31',
                'barang_nama' => 'STICK KACA',
                'barang_slug' => 'stick-kaca',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 55,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-32',
                'barang_nama' => 'WASHER KACA 35 CM',
                'barang_slug' => 'washer-kaca-35-cm',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 56,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-33',
                'barang_nama' => 'BOTOL SPRAYER',
                'barang_slug' => 'botol-sprayer',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 57,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-34',
                'barang_nama' => 'LONG STICK 3 METER',
                'barang_slug' => 'long-stick-3-meter',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 58,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-35',
                'barang_nama' => 'LONG STICK 4,5 METER',
                'barang_slug' => 'long-stick-4-5-meter',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 59,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-36',
                'barang_nama' => 'LONG STICK 8 METER',
                'barang_slug' => 'long-stick-8-meter',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 60,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '17', // Polyser
                'barang_kode' => 'KB-37',
                'barang_nama' => 'SIKAT KARPET 17"',
                'barang_slug' => 'sikat-karpet-17-inch',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 61,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '17', // Polyser
                'barang_kode' => 'KB-38',
                'barang_nama' => 'SIKAT KARPET 20"',
                'barang_slug' => 'sikat-karpet-20-inch',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 62,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-39',
                'barang_nama' => 'MOP HOLDER',
                'barang_slug' => 'mop-holder',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 63,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '16', // Nagoya
                'barang_kode' => 'KB-40',
                'barang_nama' => 'SIKAT LANTAI 60 CM',
                'barang_slug' => 'sikat-lantai-60-cm',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 64,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '16', // Nagoya
                'barang_kode' => 'KB-41',
                'barang_nama' => 'SIKAT LANTAI 30 CM',
                'barang_slug' => 'sikat-lantai-30-cm',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 65,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '16', // Nagoya
                'barang_kode' => 'KB-42',
                'barang_nama' => 'SIKAT TANGAN NILON',
                'barang_slug' => 'sikat-tangan-nilon',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 66,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-43',
                'barang_nama' => 'STICK LOBBY DUSTER',
                'barang_slug' => 'stick-lobby-duster',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 67,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-44',
                'barang_nama' => 'STICK MOP PEL',
                'barang_slug' => 'stick-mop-pel',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 68,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '16', // Nagoya
                'barang_kode' => 'KB-45',
                'barang_nama' => 'DORONGAN KARET',
                'barang_slug' => 'dorongan-karet',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 69,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '18', // Glomes
                'barang_kode' => 'KB-46',
                'barang_nama' => 'PAD POLYSER MERAH 17 INCI',
                'barang_slug' => 'pad-polyser-merah-17-inci',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 70,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '18', // Glomes
                'barang_kode' => 'KB-47',
                'barang_nama' => 'PAD POLYSER MERAH 20 INCI',
                'barang_slug' => 'pad-polyser-merah-20-inci',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 71,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '18', // Glomes
                'barang_kode' => 'KB-48',
                'barang_nama' => 'PAD POLYSER PUTIH 17 INCI',
                'barang_slug' => 'pad-polyser-putih-17-inci',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 72,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '18', // Glomes
                'barang_kode' => 'KB-49',
                'barang_nama' => 'PAD POLYSER PUTIH 20 INCI',
                'barang_slug' => 'pad-polyser-putih-20-inci',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 73,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-50',
                'barang_nama' => 'PENGKI 1 SET',
                'barang_slug' => 'pengki-1-set',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 74,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '19', // Lion Star
                'barang_kode' => 'KB-51',
                'barang_nama' => 'PENGKI PLASTIK BESAR',
                'barang_slug' => 'pengki-plastik-besar',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 75,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '19', // Lion Star
                'barang_kode' => 'KB-52',
                'barang_nama' => 'PENGKI PLASTIK KECIL',
                'barang_slug' => 'pengki-plastik-kecil',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 76,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '19', // Lion Star
                'barang_kode' => 'KB-53',
                'barang_nama' => 'PENGKI PLASTIK SEDANG',
                'barang_slug' => 'pengki-plastik-sedang',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 77,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-54',
                'barang_nama' => 'SAPU LIDI TANGKAI',
                'barang_slug' => 'sapu-lidi-tangkai',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 78,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-55',
                'barang_nama' => 'SAPU LIDI TANPA TANGKAI',
                'barang_slug' => 'sapu-lidi-tanpa-tangkai',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 79,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '16', // Nagoya
                'barang_kode' => 'KB-56',
                'barang_nama' => 'SAPU NILON',
                'barang_slug' => 'sapu-nilon',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 80,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '20', // Susemi
                'barang_kode' => 'KB-57',
                'barang_nama' => 'TAPAS HIJAU / GREEN LET',
                'barang_slug' => 'tapas-hijau-green-let',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 81,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '21', // Penta
                'barang_kode' => 'KB-58',
                'barang_nama' => 'PEMBERSIH LANTAI SUPER KLEEN',
                'barang_slug' => 'pembersih-lantai-super-kleen',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 82,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '21', // Penta
                'barang_kode' => 'KB-59',
                'barang_nama' => 'PEMBERSIH KACA GLASS CLEANER',
                'barang_slug' => 'pembersih-kaca-glass-cleaner',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 83,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '21', // Penta
                'barang_kode' => 'KB-60',
                'barang_nama' => 'SHAMPO KARPET',
                'barang_slug' => 'shampo-karpet',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 84,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '21', // Penta
                'barang_kode' => 'KB-61',
                'barang_nama' => 'PEMBERSIH KAYU FURNI SAIN',
                'barang_slug' => 'pembersih-kayu-furni-sain',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 85,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '22', // Porstek
                'barang_kode' => 'KB-62',
                'barang_nama' => 'PEMBERSIH KERAMIK',
                'barang_slug' => 'pembersih-keramik',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 86,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '21', // Penta
                'barang_kode' => 'KB-63',
                'barang_nama' => 'PEMBERSIH LANTAI FLOOR CLEANER SOS',
                'barang_slug' => 'pembersih-lantai-floor-cleaner-sos',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 87,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '21', // Penta
                'barang_kode' => 'KB-64',
                'barang_nama' => 'PEMBERSIH METAL SHINE',
                'barang_slug' => 'pembersih-metal-shine',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 88,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '23', // Sunlight
                'barang_kode' => 'KB-65',
                'barang_nama' => 'PEMBERSIH PIRING',
                'barang_slug' => 'pembersih-piring',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 89,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-66',
                'barang_nama' => 'BOWL CLEANER',
                'barang_slug' => 'bowl-cleaner',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 90,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '21', // Penta
                'barang_kode' => 'KB-67',
                'barang_nama' => 'HAND SOAP',
                'barang_slug' => 'hand-soap',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 91,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-68',
                'barang_nama' => 'TISSUE',
                'barang_slug' => 'tissue',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 92,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '24', // Livi
                'barang_kode' => 'KB-69',
                'barang_nama' => 'TISSUE HAND TOWEL 69919301',
                'barang_slug' => 'tissue-hand-towel-69919301',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 93,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '24', // Livi
                'barang_kode' => 'KB-70',
                'barang_nama' => 'TISSUE KOTAK 69911030',
                'barang_slug' => 'tissue-kotak-69911030',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 94,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-71',
                'barang_nama' => 'TISSUE NON BRAND',
                'barang_slug' => 'tissue-non-brand',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 95,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '24', // Livi
                'barang_kode' => 'KB-72',
                'barang_nama' => 'TISSUE ROLL JUMBO ECO',
                'barang_slug' => 'tissue-roll-jumbo-eco',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 96,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '24', // Livi
                'barang_kode' => 'KB-73',
                'barang_nama' => 'TISSUE ROLL KECIL EVO 69911125',
                'barang_slug' => 'tissue-roll-kecil-evo-69911125',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 97,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '25', // Attack
                'barang_kode' => 'KB-74',
                'barang_nama' => 'DETERGEN',
                'barang_slug' => 'detergen',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 98,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '21', // Penta
                'barang_kode' => 'KB-75',
                'barang_nama' => 'PEMBERSIH LANTAI STAR POWDER',
                'barang_slug' => 'pembersih-lantai-star-powder',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 99,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '26', // Vim
                'barang_kode' => 'KB-76',
                'barang_nama' => 'PEMBERSIH LANTAI',
                'barang_slug' => 'pembersih-lantai-vim',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 100,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '21', // Penta
                'barang_kode' => 'KB-77',
                'barang_nama' => 'MARBLE POWDER',
                'barang_slug' => 'marble-powder',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 101,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '27', // Seagul
                'barang_kode' => 'KB-78',
                'barang_nama' => 'KAMPER BOLA',
                'barang_slug' => 'kamper-bola',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 102,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '27', // Seagul
                'barang_kode' => 'KB-79',
                'barang_nama' => 'KAMPER GANTUNG',
                'barang_slug' => 'kamper-gantung',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 103,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '28', // Bay Fresh
                'barang_kode' => 'KB-80',
                'barang_nama' => 'PENGHARUM RUANGAN 320 GRAM',
                'barang_slug' => 'pengharum-ruangan-320-gram',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 104,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-81',
                'barang_nama' => 'GRANIT POWDER',
                'barang_slug' => 'granit-powder',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 105,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '29', // Baygon
                'barang_kode' => 'KB-82',
                'barang_nama' => 'RACUN CAIR SERANGGA',
                'barang_slug' => 'racun-cair-serangga',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 106,
                'jenisbarang_id' => '13', // KB
                'satuan_id' => null,
                'merk_id' => '6', // Universal KB
                'barang_kode' => 'KB-83',
                'barang_nama' => 'REFIL KARET STICK KACA',
                'barang_slug' => 'refil-karet-stick-kaca',
                'barang_harga' => '0',
                'barang_stok' => '0',
                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
