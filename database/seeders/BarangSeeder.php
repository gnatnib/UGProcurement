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

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Barang untuk kategori LS
            [
                'barang_id' => 107,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-01',
                'barang_nama' => 'AC SPLIT 1KVA',
                'barang_slug' => 'ac-split-1kva',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 108,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-02',
                'barang_nama' => 'AIR ACCU (REFILL)',
                'barang_slug' => 'air-accu-refill',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 109,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-03',
                'barang_nama' => 'BALLAST 10 WATT',
                'barang_slug' => 'ballast-10-watt-philips',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 110,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-04',
                'barang_nama' => 'BALLAST 18 WATT',
                'barang_slug' => 'ballast-18-watt-philips',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 111,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-05',
                'barang_nama' => 'BALLAST 20 WATT',
                'barang_slug' => 'ballast-20-watt-philips',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 112,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-06',
                'barang_nama' => 'BALLAST 36 WATT',
                'barang_slug' => 'ballast-36-watt-philips',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 113,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-07',
                'barang_nama' => 'BELL ALARM',
                'barang_slug' => 'bell-alarm',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 114,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-08',
                'barang_nama' => 'FITTING LAMPU HALOGEN 19',
                'barang_slug' => 'fitting-lampu-halogen-19',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 115,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-09',
                'barang_nama' => 'FITTING LAMPU JANTUNG',
                'barang_slug' => 'fitting-lampu-jantung',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 116,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-10',
                'barang_nama' => 'FITTING LAMPU PLS',
                'barang_slug' => 'fitting-lampu-pls',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 117,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-11',
                'barang_nama' => 'FITTING LAMPU TL',
                'barang_slug' => 'fitting-lampu-tl',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 118,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-12',
                'barang_nama' => 'FITTING LAMPU TL RING',
                'barang_slug' => 'fitting-lampu-tl-ring',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 119,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-13',
                'barang_nama' => 'FITTING LAMPU PLC GANTUNG',
                'barang_slug' => 'fitting-lampu-plc-gantung',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 120,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-14',
                'barang_nama' => 'FITTING LAMPU PLC KERAMIC',
                'barang_slug' => 'fitting-lampu-plc-keramic',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 121,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-15',
                'barang_nama' => 'FITTING LAMPU PLCS 18 WATT',
                'barang_slug' => 'fitting-lampu-plcs-18-watt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 122,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-16',
                'barang_nama' => 'FITTING STARTER',
                'barang_slug' => 'fitting-starter',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 123,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-17',
                'barang_nama' => 'FITTING LAMPU TL 120 WATT',
                'barang_slug' => 'fitting-lampu-tl-120-watt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 124,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-18',
                'barang_nama' => 'FUSE 10 AMPERE',
                'barang_slug' => 'fuse-10-ampere',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 125,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-19',
                'barang_nama' => 'FUSE 16 AMPERE',
                'barang_slug' => 'fuse-16-ampere',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 126,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '32', // Nitto
                'barang_kode' => 'LS-20',
                'barang_nama' => 'ISOLASI LISTRIK',
                'barang_slug' => 'isolasi-listrik',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 127,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '33', // Supprime
                'barang_kode' => 'LS-21',
                'barang_nama' => 'KABEL NYMHY 3X2,5MM',
                'barang_slug' => 'kabel-nymhy-3x25mm',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 128,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '33', // Supprime
                'barang_kode' => 'LS-22',
                'barang_nama' => 'KABEL NYM 3X2,5MM',
                'barang_slug' => 'kabel-nym-3x25mm',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 129,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '33', // Supprime
                'barang_kode' => 'LS-23',
                'barang_nama' => 'KABEL NYY 3X2,5MM',
                'barang_slug' => 'kabel-nyy-3x25mm',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 130,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '33', // Supprime
                'barang_kode' => 'LS-24',
                'barang_nama' => 'KABEL NYYHY 3X2,5MM',
                'barang_slug' => 'kabel-nyyhy-3x25mm',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 131,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '34', // Halopika
                'barang_kode' => 'LS-25',
                'barang_nama' => 'LAMPU HALOGEN 50 WATT',
                'barang_slug' => 'lampu-halogen-50-watt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 132,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-26',
                'barang_nama' => 'LAMPU HALOGEN 50 WATT/BALLAST',
                'barang_slug' => 'lampu-halogen-50-watt-ballast',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 133,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal LS
                'barang_kode' => 'LS-27',
                'barang_nama' => 'LAMPU JANTUNG 25 WATT',
                'barang_slug' => 'lampu-jantung-25-watt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 134,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-28',
                'barang_nama' => 'LAMPU LED 12 WATT KUNING',
                'barang_slug' => 'lampu-led-12-watt-kuning',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 135,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-29',
                'barang_nama' => 'LAMPU LED 12 WATT PUTIH',
                'barang_slug' => 'lampu-led-12-watt-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 136,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-30',
                'barang_nama' => 'LAMPU LED 19 WATT',
                'barang_slug' => 'lampu-led-19-watt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 137,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '35', // Briliant
                'barang_kode' => 'LS-31',
                'barang_nama' => 'LAMPU LED PAR 30',
                'barang_slug' => 'lampu-led-par-30',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 138,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-32',
                'barang_nama' => 'LAMPU LED PAR 38 80 WATT',
                'barang_slug' => 'lampu-led-par-38-80-watt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 139,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-33',
                'barang_nama' => 'LAMPU PIJAR 40 WATT',
                'barang_slug' => 'lampu-pijar-40-watt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 140,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-34',
                'barang_nama' => 'LAMPU PLC 11 WATT PUTIH',
                'barang_slug' => 'lampu-plc-11-watt-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 141,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-35',
                'barang_nama' => 'LAMPU PLC 14 WATT PUTIH',
                'barang_slug' => 'lampu-plc-14-watt-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 142,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-36',
                'barang_nama' => 'LAMPU PLC 18 WATT KUNING',
                'barang_slug' => 'lampu-plc-18-watt-kuning',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 143,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-37',
                'barang_nama' => 'LAMPU PLC 18 WATT PUTIH',
                'barang_slug' => 'lampu-plc-18-watt-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 144,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-38',
                'barang_nama' => 'LAMPU PLCS 11 WATT',
                'barang_slug' => 'lampu-plcs-11-watt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 145,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-39',
                'barang_nama' => 'LAMPU PLCS 18 WATT KUNING',
                'barang_slug' => 'lampu-plcs-18-watt-kuning',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 146,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-40',
                'barang_nama' => 'LAMPU PLCS 18 WATT PUTIH',
                'barang_slug' => 'lampu-plcs-18-watt-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 147,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-41',
                'barang_nama' => 'LAMPU PLS 9 WATT KUNING',
                'barang_slug' => 'lampu-pls-9-watt-kuning',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 148,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-42',
                'barang_nama' => 'LAMPU PLS 9 WATT PUTIH',
                'barang_slug' => 'lampu-pls-9-watt-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 149,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-43',
                'barang_nama' => 'LAMPU T5 LED 13 WATT PUTIH',
                'barang_slug' => 'lampu-t5-led-13-watt-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 150,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-44',
                'barang_nama' => 'LAMPU T5 14 WATT PUTIH',
                'barang_slug' => 'lampu-t5-14-watt-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 151,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-45',
                'barang_nama' => 'LAMPU T5 21 ESSENSIAL PUTIH',
                'barang_slug' => 'lampu-t5-21-essensial-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 152,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-46',
                'barang_nama' => 'LAMPU T5 28 ESSENSIAL KUNING',
                'barang_slug' => 'lampu-t5-28-essensial-kuning',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 153,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-47',
                'barang_nama' => 'LAMPU T5 28 ESSENSIAL PUTIH',
                'barang_slug' => 'lampu-t5-28-essensial-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 154,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-48',
                'barang_nama' => 'LAMPU T5 28 KUNING',
                'barang_slug' => 'lampu-t5-28-kuning',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 155,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-49',
                'barang_nama' => 'LAMPU T5 28 PUTIH',
                'barang_slug' => 'lampu-t5-28-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 156,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-50',
                'barang_nama' => 'LAMPU T5 8 WATT KUNING',
                'barang_slug' => 'lampu-t5-8-watt-kuning',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 157,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-51',
                'barang_nama' => 'LAMPU T5 8 WATT PUTIH',
                'barang_slug' => 'lampu-t5-8-watt-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 158,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-52',
                'barang_nama' => 'LAMPU TL 10 WATT KUNING',
                'barang_slug' => 'lampu-tl-10-watt-kuning',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 159,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-53',
                'barang_nama' => 'LAMPU TL 10 WATT PUTIH',
                'barang_slug' => 'lampu-tl-10-watt-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 160,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-54',
                'barang_nama' => 'LAMPU TL 18 WATT 33, 54 KUNING',
                'barang_slug' => 'lampu-tl-18-watt-33-54-kuning',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 161,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-55',
                'barang_nama' => 'LAMPU TL 18 WATT 33, 54 PUTIH',
                'barang_slug' => 'lampu-tl-18-watt-33-54-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 162,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-56',
                'barang_nama' => 'LAMPU TL 36 WATT 33, 54 PUTIH',
                'barang_slug' => 'lampu-tl-36-watt-33-54-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 163,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-57',
                'barang_nama' => 'LAMPU TL RING 22 WATT',
                'barang_slug' => 'lampu-tl-ring-22-watt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 164,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-58',
                'barang_nama' => 'LAMPU TL RING 32 WATT',
                'barang_slug' => 'lampu-tl-ring-32-watt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 165,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '36', // Schneider
                'barang_kode' => 'LS-59',
                'barang_nama' => 'MCB 10 AMPERE 1 PHASE',
                'barang_slug' => 'mcb-10-ampere-1-phase',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 166,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '36', // Schneider
                'barang_kode' => 'LS-60',
                'barang_nama' => 'MCB 10 AMPERE 3 PHASE',
                'barang_slug' => 'mcb-10-ampere-3-phase',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 167,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '36', // Schneider
                'barang_kode' => 'LS-61',
                'barang_nama' => 'MCB 16 AMPERE 1 PHASE',
                'barang_slug' => 'mcb-16-ampere-1-phase',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 168,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '36', // Schneider
                'barang_kode' => 'LS-62',
                'barang_nama' => 'MCB 16 AMPERE 3 PHASE',
                'barang_slug' => 'mcb-16-ampere-3-phase',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 169,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '37', // Omron
                'barang_kode' => 'LS-63',
                'barang_nama' => 'MCB H3CR-A8',
                'barang_slug' => 'mcb-h3cr-a8',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 170,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-64',
                'barang_nama' => 'PELINDUNG KABEL DURADUS HITAM',
                'barang_slug' => 'pelindung-kabel-duradus-hitam',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 171,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-65',
                'barang_nama' => 'PELINDUNG KABEL DURADUS PUTIH',
                'barang_slug' => 'pelindung-kabel-duradus-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 172,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '38', // Rexco
                'barang_kode' => 'LS-66',
                'barang_nama' => 'PEMBERSIH KARAT CONTAK CLEANER',
                'barang_slug' => 'pembersih-karat-contak-cleaner',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 173,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '39', // Berrker
                'barang_kode' => 'LS-67',
                'barang_nama' => 'SAKLAR ENGKEL IN BOW',
                'barang_slug' => 'saklar-engkel-in-bow',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 174,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '40', // Broco
                'barang_kode' => 'LS-68',
                'barang_nama' => 'SAKLAR ENGKEL IN BOW',
                'barang_slug' => 'saklar-engkel-in-bow-broco',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 175,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-69',
                'barang_nama' => 'SAKLAR PUSH BUTTON ON/OFF',
                'barang_slug' => 'saklar-push-button-on-off',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 176,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '41', // Panasonic LS
                'barang_kode' => 'LS-70',
                'barang_nama' => 'SAKLAR SERI OUT BOW',
                'barang_slug' => 'saklar-seri-out-bow',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 177,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-71',
                'barang_nama' => 'STARTER S10',
                'barang_slug' => 'starter-s10',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 178,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-72',
                'barang_nama' => 'STARTER S2',
                'barang_slug' => 'starter-s2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 179,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-73',
                'barang_nama' => 'STEKER ARDE',
                'barang_slug' => 'steker-arde',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 180,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '40', // Broco
                'barang_kode' => 'LS-74',
                'barang_nama' => 'STOP KONTAK 2 LUBANG',
                'barang_slug' => 'stop-kontak-2-lubang',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 181,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '40', // Broco
                'barang_kode' => 'LS-75',
                'barang_nama' => 'STOP KONTAK 3 LUBANG',
                'barang_slug' => 'stop-kontak-3-lubang',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 182,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '40', // Broco
                'barang_kode' => 'LS-76',
                'barang_nama' => 'STOP KONTAK 4 LUBANG',
                'barang_slug' => 'stop-kontak-4-lubang',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 183,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-77',
                'barang_nama' => 'STOP KONTAK IN BOW 1 LUBANG',
                'barang_slug' => 'stop-kontak-in-bow-1-lubang',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 184,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '41', // Panasonic LS
                'barang_kode' => 'LS-78',
                'barang_nama' => 'STOP KONTAK IN BOW 2 LUBANG',
                'barang_slug' => 'stop-kontak-in-bow-2-lubang',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 185,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '41', // Panasonic LS
                'barang_kode' => 'LS-79',
                'barang_nama' => 'STOP KONTAK 1 LUBANG OUT BOW',
                'barang_slug' => 'stop-kontak-1-lubang-out-bow',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 186,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '41', // Panasonic LS
                'barang_kode' => 'LS-80',
                'barang_nama' => 'STOP KONTAK SERI OUT BOW',
                'barang_slug' => 'stop-kontak-seri-out-bow',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 187,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-81',
                'barang_nama' => 'T DUS 3 LOBANG',
                'barang_slug' => 't-dus-3-lobang',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 188,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-82',
                'barang_nama' => 'T DUS 4 LOBANG',
                'barang_slug' => 't-dus-4-lobang',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 189,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '30', // Universal
                'barang_kode' => 'LS-83',
                'barang_nama' => 'T. KOMBINASI',
                'barang_slug' => 't-kombinasi',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 190,
                'jenisbarang_id' => '14', // LS
                'satuan_id' => null,
                'merk_id' => '31', // Philips
                'barang_kode' => 'LS-84',
                'barang_nama' => 'TRAVO LAMPU HALOGEN / BALLAST',
                'barang_slug' => 'travo-lampu-halogen-ballast',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Barang untuk kategori Plumbing (PL)
            [
                'barang_id' => 191,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '43', // Toto
                'barang_kode' => 'PL-01',
                'barang_nama' => 'KRAN LEHER ANGSA PANTRY',
                'barang_slug' => 'kran-leher-angsa-pantry',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 192,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '44', // Kitz
                'barang_kode' => 'PL-02',
                'barang_nama' => 'KRAN GATE VALVE 1/2" KUNINGAN',
                'barang_slug' => 'kran-gate-valve-1-2-kuningan',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 193,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '44', // Kitz
                'barang_kode' => 'PL-03',
                'barang_nama' => 'KRAN GATE VALVE 3/4"',
                'barang_slug' => 'kran-gate-valve-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 194,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '44', // Kitz
                'barang_kode' => 'PL-04',
                'barang_nama' => 'KRAN GATE VALVE 1 1/2"',
                'barang_slug' => 'kran-gate-valve-1-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 195,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '44', // Kitz
                'barang_kode' => 'PL-05',
                'barang_nama' => 'KRAN GATE VALVE 1"',
                'barang_slug' => 'kran-gate-valve-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 196,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '44', // Kitz
                'barang_kode' => 'PL-06',
                'barang_nama' => 'KRAN GATE VALVE 2"',
                'barang_slug' => 'kran-gate-valve-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 197,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '44', // Kitz
                'barang_kode' => 'PL-07',
                'barang_nama' => 'KRAN GATE VALVE PVC 3/4"',
                'barang_slug' => 'kran-gate-valve-pvc-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 198,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '54', // San-Ei
                'barang_kode' => 'PL-08',
                'barang_nama' => 'KRAN LEHER ANGSA',
                'barang_slug' => 'kran-leher-angsa',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 199,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '45', // Onda
                'barang_kode' => 'PL-09',
                'barang_nama' => 'KRAN TAMAN 821',
                'barang_slug' => 'kran-taman-821',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 200,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '43', // Toto
                'barang_kode' => 'PL-10',
                'barang_nama' => 'KRAN STOP KRAN',
                'barang_slug' => 'kran-stop-kran',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 201,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '43', // Toto
                'barang_kode' => 'PL-11',
                'barang_nama' => 'KRAN TEKAN',
                'barang_slug' => 'kran-tekan',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 202,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '43', // Toto
                'barang_kode' => 'PL-12',
                'barang_nama' => 'KRAN TEMBOK',
                'barang_slug' => 'kran-tembok',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 203,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '46', // Wasser
                'barang_kode' => 'PL-13',
                'barang_nama' => 'KRAN TEMBOK',
                'barang_slug' => 'kran-tembok-wasser',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 204,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '43', // Toto
                'barang_kode' => 'PL-14',
                'barang_nama' => 'KRAN UNGKIT',
                'barang_slug' => 'kran-ungkit',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 205,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '47', // Kuda Bintang
                'barang_kode' => 'PL-15',
                'barang_nama' => 'PEMBERSIH LUMUT-SODA API',
                'barang_slug' => 'pembersih-lumut-soda-api',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 206,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '48', // Omega
                'barang_kode' => 'PL-16',
                'barang_nama' => 'PENJEPIT PIPA-KLEM 1 1/2" X 2"',
                'barang_slug' => 'penjepit-pipa-klem-1-1-2-x-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 207,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '48', // Omega
                'barang_kode' => 'PL-17',
                'barang_nama' => 'PENJEPIT PIPA-KLEM 2"',
                'barang_slug' => 'penjepit-pipa-klem-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 208,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal (no specific brand mentioned)
                'barang_kode' => 'PL-18',
                'barang_nama' => 'PENJEPIT PIPA-KLEM SADEL 2 1/2 X 1/2"',
                'barang_slug' => 'penjepit-pipa-klem-sadel-2-1-2-x-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 209,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal (no specific brand mentioned)
                'barang_kode' => 'PL-19',
                'barang_nama' => 'PENJEPIT PIPA-KLEM SADEL 2 X 1/2"',
                'barang_slug' => 'penjepit-pipa-klem-sadel-2-x-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 210,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal (no specific brand mentioned)
                'barang_kode' => 'PL-20',
                'barang_nama' => 'PENJEPIT PIPA-KLEM SADEL 3 X 1/2"',
                'barang_slug' => 'penjepit-pipa-klem-sadel-3-x-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 211,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-21',
                'barang_nama' => 'PENUTUP PIPA-DOP PVC 3"',
                'barang_slug' => 'penutup-pipa-dop-pvc-3',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 212,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal (no specific brand mentioned)
                'barang_kode' => 'PL-22',
                'barang_nama' => 'PENUTUP PIPA-DOP BESI 1"',
                'barang_slug' => 'penutup-pipa-dop-besi-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 213,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal (no specific brand mentioned)
                'barang_kode' => 'PL-23',
                'barang_nama' => 'PENUTUP PIPA-DOP BESI 1/2"',
                'barang_slug' => 'penutup-pipa-dop-besi-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 214,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal (no specific brand mentioned)
                'barang_kode' => 'PL-24',
                'barang_nama' => 'PENUTUP PIPA-DOP BESI 3/4"',
                'barang_slug' => 'penutup-pipa-dop-besi-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 215,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-25',
                'barang_nama' => 'PENUTUP PIPA-DOP PVC 1 1/2"',
                'barang_slug' => 'penutup-pipa-dop-pvc-1-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 216,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-26',
                'barang_nama' => 'PENUTUP PIPA-DOP PVC 1 1/4"',
                'barang_slug' => 'penutup-pipa-dop-pvc-1-1-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 217,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-27',
                'barang_nama' => 'PENUTUP PIPA-DOP PVC 1"',
                'barang_slug' => 'penutup-pipa-dop-pvc-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 218,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-28',
                'barang_nama' => 'PENUTUP PIPA-DOP PVC 1/2"',
                'barang_slug' => 'penutup-pipa-dop-pvc-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 219,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-29',
                'barang_nama' => 'PENUTUP PIPA-DOP PVC 2"',
                'barang_slug' => 'penutup-pipa-dop-pvc-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 220,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '50', // Isarplas
                'barang_kode' => 'PL-30',
                'barang_nama' => 'PEREKAT LEM PIPA PVC',
                'barang_slug' => 'perekat-lem-pipa-pvc',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 221,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '45', // Onda
                'barang_kode' => 'PL-31',
                'barang_nama' => 'PEREKAT SEAL TAPE KECIL',
                'barang_slug' => 'perekat-seal-tape-kecil',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 222,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-32',
                'barang_nama' => 'PIPA PVC 1 1/2"',
                'barang_slug' => 'pipa-pvc-1-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 223,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-33',
                'barang_nama' => 'PIPA PVC 1 1/4"',
                'barang_slug' => 'pipa-pvc-1-1-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 224,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-34',
                'barang_nama' => 'PIPA PVC 1"',
                'barang_slug' => 'pipa-pvc-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 225,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-35',
                'barang_nama' => 'PIPA PVC 1/2"',
                'barang_slug' => 'pipa-pvc-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 226,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-36',
                'barang_nama' => 'PIPA PVC 2 1/2"',
                'barang_slug' => 'pipa-pvc-2-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 227,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-37',
                'barang_nama' => 'PIPA PVC 2"',
                'barang_slug' => 'pipa-pvc-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 228,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-38',
                'barang_nama' => 'PIPA PVC 3"',
                'barang_slug' => 'pipa-pvc-3',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 229,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-39',
                'barang_nama' => 'PIPA PVC 3/4"',
                'barang_slug' => 'pipa-pvc-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 230,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal (no specific brand mentioned)
                'barang_kode' => 'PL-40',
                'barang_nama' => 'SAMBUNGAN PIPA-DOUBLE NEPEL KUNINGAN 1/2"',
                'barang_slug' => 'sambungan-pipa-double-nepel-kuningan-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 231,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-41',
                'barang_nama' => 'SAMBUNGAN PIPA-DOUBLE NEPEL KUNINGAN 3/4"',
                'barang_slug' => 'sambungan-pipa-double-nepel-kuningan-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 232,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-42',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE BESI 1"',
                'barang_slug' => 'sambungan-pipa-knee-besi-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 233,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-43',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE BESI 1/2"',
                'barang_slug' => 'sambungan-pipa-knee-besi-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 234,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-44',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE BESI 3/4"',
                'barang_slug' => 'sambungan-pipa-knee-besi-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 235,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-45',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE PVC 1 1/2"',
                'barang_slug' => 'sambungan-pipa-knee-pvc-1-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 236,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-46',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE PVC 1 1/4"',
                'barang_slug' => 'sambungan-pipa-knee-pvc-1-1-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 237,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-47',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE PVC 1"',
                'barang_slug' => 'sambungan-pipa-knee-pvc-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 238,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-48',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE PVC 1/2"',
                'barang_slug' => 'sambungan-pipa-knee-pvc-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 239,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-49',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE PVC 2"',
                'barang_slug' => 'sambungan-pipa-knee-pvc-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 240,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-50',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE PVC 3"',
                'barang_slug' => 'sambungan-pipa-knee-pvc-3',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 241,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-51',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE PVC 3/4"',
                'barang_slug' => 'sambungan-pipa-knee-pvc-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 242,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-52',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE PVC DRAT DALAM 1"',
                'barang_slug' => 'sambungan-pipa-knee-pvc-drat-dalam-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 243,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-53',
                'barang_nama' => 'SAMBUNGAN PIPA-KNEE PVC DRAT DALAM 3/4"',
                'barang_slug' => 'sambungan-pipa-knee-pvc-drat-dalam-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 244,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-54',
                'barang_nama' => 'SAMBUNGAN PIPA-PLUG BESI 1"',
                'barang_slug' => 'sambungan-pipa-plug-besi-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 245,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-55',
                'barang_nama' => 'SAMBUNGAN PIPA-PLUG BESI 3/4"',
                'barang_slug' => 'sambungan-pipa-plug-besi-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 246,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-56',
                'barang_nama' => 'SAMBUNGAN PIPA-PLUG BESI 1/2"',
                'barang_slug' => 'sambungan-pipa-plug-besi-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 247,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-57',
                'barang_nama' => 'SAMBUNGAN PIPA-PLUG PVC 1"',
                'barang_slug' => 'sambungan-pipa-plug-pvc-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 248,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-58',
                'barang_nama' => 'SAMBUNGAN PIPA-PLUG PVC 1/2"',
                'barang_slug' => 'sambungan-pipa-plug-pvc-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 249,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-59',
                'barang_nama' => 'SAMBUNGAN PIPA-PLUG PVC 3/4"',
                'barang_slug' => 'sambungan-pipa-plug-pvc-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 250,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-60',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK BESI 1"',
                'barang_slug' => 'sambungan-pipa-sock-besi-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 251,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-61',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK BESI 1/2"',
                'barang_slug' => 'sambungan-pipa-sock-besi-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 252,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-62',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK BESI 3/4"',
                'barang_slug' => 'sambungan-pipa-sock-besi-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 253,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-63',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC 1 1/2"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-1-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 254,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-64',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC 1 1/4"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-1-1-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 255,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-65',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC 1"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 256,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-66',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC 1/2"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 257,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-67',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC 2"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 258,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-68',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC 3"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-3',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 259,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-69',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC 3/4"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 260,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-70',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC DRAT DALAM 1"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-drat-dalam-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 261,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-71',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC DRAT DALAM 1/2"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-drat-dalam-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 262,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-72',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC DRAT DALAM 3/4"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-drat-dalam-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 263,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-73',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC DRAT LUAR 1"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-drat-luar-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 264,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-74',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC DRAT LUAR 1/2"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-drat-luar-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 265,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-75',
                'barang_nama' => 'SAMBUNGAN PIPA-SOCK PVC DRAT LUAR 3/4"',
                'barang_slug' => 'sambungan-pipa-sock-pvc-drat-luar-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 266,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-76',
                'barang_nama' => 'SAMBUNGAN PIPA-T BESI DRAT LUAR DALAM 1/2"',
                'barang_slug' => 'sambungan-pipa-t-besi-drat-luar-dalam-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 267,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-77',
                'barang_nama' => 'SAMBUNGAN PIPA-T PVC 1"',
                'barang_slug' => 'sambungan-pipa-t-pvc-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 268,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-78',
                'barang_nama' => 'SAMBUNGAN PIPA-T PVC 1/2"',
                'barang_slug' => 'sambungan-pipa-t-pvc-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 269,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-79',
                'barang_nama' => 'SAMBUNGAN PIPA-T PVC 2"',
                'barang_slug' => 'sambungan-pipa-t-pvc-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 270,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '49', // Rucika
                'barang_kode' => 'PL-80',
                'barang_nama' => 'SAMBUNGAN PIPA-T PVC 3 KE 2',
                'barang_slug' => 'sambungan-pipa-t-pvc-3-ke-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 271,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-81',
                'barang_nama' => 'SAMBUNGAN PIPA-T PVC DRAT DALAM 1/2"',
                'barang_slug' => 'sambungan-pipa-t-pvc-drat-dalam-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 272,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-82',
                'barang_nama' => 'SAMBUNGAN PIPA-VLOK SOCK BESI 1 KE 1 1/2"',
                'barang_slug' => 'sambungan-pipa-vlok-sock-besi-1-ke-1-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 273,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-83',
                'barang_nama' => 'SAMBUNGAN PIPA-VLOK SOCK BESI 1"',
                'barang_slug' => 'sambungan-pipa-vlok-sock-besi-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 274,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-84',
                'barang_nama' => 'SAMBUNGAN PIPA-VLOK SOCK BESI 3/4 KE 1"',
                'barang_slug' => 'sambungan-pipa-vlok-sock-besi-3-4-ke-1',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 275,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-85',
                'barang_nama' => 'SAMBUNGAN PIPA-VLOK SOCK BESI 3/4 KE 1/2"',
                'barang_slug' => 'sambungan-pipa-vlok-sock-besi-3-4-ke-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 276,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-86',
                'barang_nama' => 'SAMBUNGAN PIPA-VLOK SOCK PVC 1 1/2" X 1 1/4"',
                'barang_slug' => 'sambungan-pipa-vlok-sock-pvc-1-1-2-x-1-1-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 277,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-87',
                'barang_nama' => 'SAMBUNGAN PIPA-VLOK SOCK PVC 1" X 1/2"',
                'barang_slug' => 'sambungan-pipa-vlok-sock-pvc-1-x-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 278,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-88',
                'barang_nama' => 'SAMBUNGAN PIPA-VLOK SOCK PVC 1" X 3/4"',
                'barang_slug' => 'sambungan-pipa-vlok-sock-pvc-1-x-3-4',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 279,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-89',
                'barang_nama' => 'SAMBUNGAN PIPA-VLOK SOCK PVC 2" X 1 1/2"',
                'barang_slug' => 'sambungan-pipa-vlok-sock-pvc-2-x-1-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 287,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Universal
                'barang_kode' => 'PL-90',
                'barang_nama' => 'SAMBUNGAN PIPA VLOK TRAP 1/2',
                'barang_slug' => 'sambungan-pipa-vlok-trap-1-2',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 280,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '43', // Toto
                'barang_kode' => 'PL-91',
                'barang_nama' => 'SHOWER WC',
                'barang_slug' => 'shower-wc',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 281,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '43', // Toto
                'barang_kode' => 'PL-92',
                'barang_nama' => 'SLANG FLEXIBLE 50 CM',
                'barang_slug' => 'slang-flexible-50-cm',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 282,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '51', // Lupex
                'barang_kode' => 'PL-93',
                'barang_nama' => 'SLANG-SHIFON PANTRY',
                'barang_slug' => 'slang-shifon-pantry',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 283,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '43', // Toto
                'barang_kode' => 'PL-94',
                'barang_nama' => 'SOAP DISPENSER PLASTIK',
                'barang_slug' => 'soap-dispenser-plastik',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 284,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '52', // American Standard
                'barang_kode' => 'PL-95',
                'barang_nama' => 'TUTUP CLOSET PUTIH',
                'barang_slug' => 'tutup-closet-putih',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 285,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '42', // Aslas
                'barang_kode' => 'PL-96',
                'barang_nama' => 'TUTUP FLOOR DRAIN',
                'barang_slug' => 'tutup-floor-drain',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 286,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '53', // Aslas
                'barang_kode' => 'PL-97',
                'barang_nama' => 'URINE PROTEKTOR',
                'barang_slug' => 'urine-protektor',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 314,
                'jenisbarang_id' => '15', // PL
                'satuan_id' => null,
                'merk_id' => '50', // Isarplas
                'barang_kode' => 'PL-98',
                'barang_nama' => 'LEM PIPA PVC',
                'barang_slug' => 'lem-pipa-pvc',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Barang untuk kategori Sipil (SPL)
            [
                'barang_id' => 288,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '56', // Unnu 
                'barang_kode' => 'SPL-01',
                'barang_nama' => 'ALAT UKUR-METERAN 5 METER',
                'barang_slug' => 'alat-ukur-meteran-5-meter',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 289,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '55', // Universal (no specific brand)
                'barang_kode' => 'SPL-02',
                'barang_nama' => 'DEMPUL GYPSUM',
                'barang_slug' => 'dempul-gypsum',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 290,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '57', // Narita
                'barang_kode' => 'SPL-03',
                'barang_nama' => 'GANTUNGAN BAJU',
                'barang_slug' => 'gantungan-baju',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 291,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '55', // Universal (no specific brand)
                'barang_kode' => 'SPL-04',
                'barang_nama' => 'KUNCI AHU',
                'barang_slug' => 'kunci-ahu',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 292,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '58', // Dorma
                'barang_kode' => 'SPL-05',
                'barang_nama' => 'KUNCI DOOR CLOSER DORMATS 65',
                'barang_slug' => 'kunci-door-closer-dormats-65',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 293,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '58', // Dorma
                'barang_kode' => 'SPL-06',
                'barang_nama' => 'KUNCI DOOR CLOSER TS 68',
                'barang_slug' => 'kunci-door-closer-ts-68',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 294,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '58', // Dorma
                'barang_kode' => 'SPL-07',
                'barang_nama' => 'KUNCI DOOR CLOSER TS 73V',
                'barang_slug' => 'kunci-door-closer-ts-73v',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 295,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '58', // Dorma
                'barang_kode' => 'SPL-08',
                'barang_nama' => 'KUNCI FLOOR HINGS BTS 84',
                'barang_slug' => 'kunci-floor-hings-bts-84',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 296,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '59', // Soligen
                'barang_kode' => 'SPL-09',
                'barang_nama' => 'KUNCI GRENDEL PINTU / SELOT',
                'barang_slug' => 'kunci-grendel-pintu-selot',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 297,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '60', // Hapele
                'barang_kode' => 'SPL-10',
                'barang_nama' => 'KUNCI LACI',
                'barang_slug' => 'kunci-laci',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 298,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '55', // Universal
                'barang_kode' => 'SPL-11',
                'barang_nama' => 'KUNCI JENDELA / RAMBUNCIS',
                'barang_slug' => 'kunci-jendela-rambuncis',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 299,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '55', // Universal
                'barang_kode' => 'SPL-12',
                'barang_nama' => 'KUNCI PANEL',
                'barang_slug' => 'kunci-panel',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 300,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '55', // Universal
                'barang_kode' => 'SPL-13',
                'barang_nama' => 'KUNCI SERI SAMPING',
                'barang_slug' => 'kunci-seri-samping',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 301,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '55', // Universal
                'barang_kode' => 'SPL-14',
                'barang_nama' => 'KUNCI SERI DEPAN',
                'barang_slug' => 'kunci-seri-depan',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 302,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '55', // Universal
                'barang_kode' => 'SPL-15',
                'barang_nama' => 'KUNCI TANGGA DARURAT',
                'barang_slug' => 'kunci-tangga-darurat',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 303,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '61', // Dekson
                'barang_kode' => 'SPL-16',
                'barang_nama' => 'KUNCI TOILET DEKSON',
                'barang_slug' => 'kunci-toilet-dekson',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 304,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '62', // Solid
                'barang_kode' => 'SPL-17',
                'barang_nama' => 'KUNCI TOILET SOLID',
                'barang_slug' => 'kunci-toilet-solid',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 305,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '59', // Soligen
                'barang_kode' => 'SPL-18',
                'barang_nama' => 'KUNCI SILINDER',
                'barang_slug' => 'kunci-silinder',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 306,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '63', // Dextone
                'barang_kode' => 'SPL-19',
                'barang_nama' => 'LEM PLASTIK',
                'barang_slug' => 'lem-plastik',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 307,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '64', // Aibon
                'barang_kode' => 'SPL-20',
                'barang_nama' => 'LEM KAYU',
                'barang_slug' => 'lem-kayu',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 308,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '66', // Vitech
                'barang_kode' => 'SPL-21',
                'barang_nama' => 'LEM-SEALANT HITAM',
                'barang_slug' => 'lem-sealant-hitam-vitech',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 309,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '66', // Vitech
                'barang_kode' => 'SPL-22',
                'barang_nama' => 'LEM-SEALANT BENING',
                'barang_slug' => 'lem-sealant-bening-vitech',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 310,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '66', // Vitech
                'barang_kode' => 'SPL-23',
                'barang_nama' => 'LEM-SEALANT PUTIH',
                'barang_slug' => 'lem-sealant-putih-vitech',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 311,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '67', // FRT
                'barang_kode' => 'SPL-24',
                'barang_nama' => 'PERALATAN SIPIL-KAPE ALUMINIUM',
                'barang_slug' => 'peralatan-sipil-kape-aluminium-frt',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 312,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '55', // Universal
                'barang_kode' => 'SPL-25',
                'barang_nama' => 'SEMEN ABU ABU',
                'barang_slug' => 'semen-abu-abu-tiga-roda',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 313,
                'jenisbarang_id' => '16', // SPL
                'satuan_id' => null,
                'merk_id' => '55', // Universal
                'barang_kode' => 'SPL-26',
                'barang_nama' => 'Z MACAM MACAM',
                'barang_slug' => 'z-macam-macam',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Barang untuk kategori Telepon (TLP)
            [
                'barang_id' => 315,
                'jenisbarang_id' => '17', // TLP
                'satuan_id' => null,
                'merk_id' => '69', // Belden
                'barang_kode' => 'TLP-01',
                'barang_nama' => 'KABEL CCTV RG59',
                'barang_slug' => 'kabel-cctv-rg59-belden',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 316,
                'jenisbarang_id' => '17', // TLP
                'satuan_id' => null,
                'merk_id' => '68', // Universal
                'barang_kode' => 'TLP-02',
                'barang_nama' => 'KABEL TELEPON 2 PAIR 10X2X0,6',
                'barang_slug' => 'kabel-telepon-2-pair-10x2x0-6',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 317,
                'jenisbarang_id' => '17', // TLP
                'satuan_id' => null,
                'merk_id' => '68', // Universal
                'barang_kode' => 'TLP-03',
                'barang_nama' => 'ROSSET TELEPON',
                'barang_slug' => 'rosset-telepon',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 318,
                'jenisbarang_id' => '17', // TLP
                'satuan_id' => null,
                'merk_id' => '70', // Alcatel Izzi
                'barang_kode' => 'TLP-04',
                'barang_nama' => 'TELEPON ALCATEL IZZI',
                'barang_slug' => 'telepon-alcatel',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 319,
                'jenisbarang_id' => '17', // TLP
                'satuan_id' => null,
                'merk_id' => '71', // Panasonic
                'barang_kode' => 'TLP-05',
                'barang_nama' => 'TELEPON PANASONIC ANALOG',
                'barang_slug' => 'telepon-panasonic',
                'barang_harga' => '0',

                'barang_gambar' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
