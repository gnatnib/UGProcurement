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
            //Merk Barang untuk kategori AC
            [
                'merk_id' => 1,
                'merk_nama' => 'Universal',
                'merk_slug' => 'ac-universal',
                'merk_keterangan' => 'Merk barang universal (tanpa merek)',
                'jenisbarang_id' => 12, //AC
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 2,
                'merk_nama' => 'Saeki',
                'merk_slug' => 'saeki',
                'merk_keterangan' => 'Merk barang Saeki',
                'jenisbarang_id' => 12, //AC
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 3,
                'merk_nama' => 'Panasonic',
                'merk_slug' => 'panasonic',
                'merk_keterangan' => 'Merk Panasonic',
                'jenisbarang_id' => 12, //AC
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 4,
                'merk_nama' => 'Dupont',
                'merk_slug' => 'dupont',
                'merk_keterangan' => 'Merk Dupont',
                'jenisbarang_id' => 12, //AC
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 5,
                'merk_nama' => 'Bando',
                'merk_slug' => 'bando',
                'merk_keterangan' => 'Merk Bando',
                'jenisbarang_id' => 12, //AC
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 72,
                'merk_nama' => 'Mitsubishi',
                'merk_slug' => 'mitsubishi',
                'merk_keterangan' => 'Merk Mitsubishi',
                'jenisbarang_id' => 12, //AC
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Merk barang untuk kategori kebersihan (KB)
            [
                'merk_id' => 6,
                'merk_nama' => 'Universal',
                'merk_slug' => 'kb-universal',
                'merk_keterangan' => 'Merk barang universal (tanpa merek)',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 7,
                'merk_nama' => 'Loco',
                'merk_slug' => 'loco',
                'merk_keterangan' => 'Merk Loco',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 8,
                'merk_nama' => 'Banteng',
                'merk_slug' => 'banteng',
                'merk_keterangan' => 'Merk Banteng',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 9,
                'merk_nama' => 'Champion',
                'merk_slug' => 'champion',
                'merk_keterangan' => 'Merk Champion',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 10,
                'merk_nama' => 'Ansel',
                'merk_slug' => 'ansel',
                'merk_keterangan' => 'Merk Ansel',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 11,
                'merk_nama' => 'Heron',
                'merk_slug' => 'heron',
                'merk_keterangan' => 'Merk Heron',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 12,
                'merk_nama' => 'Kenmaster',
                'merk_slug' => 'kenmaster',
                'merk_keterangan' => 'Merk Kenmaster',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 13,
                'merk_nama' => 'Star',
                'merk_slug' => 'star',
                'merk_keterangan' => 'Merk Star',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 14,
                'merk_nama' => 'Chic',
                'merk_slug' => 'chic',
                'merk_keterangan' => 'Merk Chic',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 15,
                'merk_nama' => 'Otsu',
                'merk_slug' => 'otsu',
                'merk_keterangan' => 'Merk Otsu',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 16,
                'merk_nama' => 'Nagoya',
                'merk_slug' => 'nagoya',
                'merk_keterangan' => 'Merk Nagoya',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 17,
                'merk_nama' => 'Polyser',
                'merk_slug' => 'polyser',
                'merk_keterangan' => 'Merk Polyser',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 18,
                'merk_nama' => 'Glomes',
                'merk_slug' => 'glomes',
                'merk_keterangan' => 'Merk Glomes',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 19,
                'merk_nama' => 'Lion Star',
                'merk_slug' => 'lion-star',
                'merk_keterangan' => 'Merk Lion Star',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 20,
                'merk_nama' => 'Susemi',
                'merk_slug' => 'susemi',
                'merk_keterangan' => 'Merk Susemi',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 21,
                'merk_nama' => 'Penta',
                'merk_slug' => 'penta',
                'merk_keterangan' => 'Merk Penta',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 22,
                'merk_nama' => 'Porstek',
                'merk_slug' => 'porstek',
                'merk_keterangan' => 'Merk Porstek',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 23,
                'merk_nama' => 'Sunlight',
                'merk_slug' => 'sunlight',
                'merk_keterangan' => 'Merk Sunlight',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 24,
                'merk_nama' => 'Livi',
                'merk_slug' => 'livi',
                'merk_keterangan' => 'Merk Livi',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 25,
                'merk_nama' => 'Attack',
                'merk_slug' => 'attack',
                'merk_keterangan' => 'Merk Attack',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 26,
                'merk_nama' => 'Vim',
                'merk_slug' => 'vim',
                'merk_keterangan' => 'Merk Vim',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 27,
                'merk_nama' => 'Seagul',
                'merk_slug' => 'seagul',
                'merk_keterangan' => 'Merk Seagul',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 28,
                'merk_nama' => 'Bay Fresh',
                'merk_slug' => 'bay-fresh',
                'merk_keterangan' => 'Merk Bay Fresh',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 29,
                'merk_nama' => 'Baygon',
                'merk_slug' => 'baygon',
                'merk_keterangan' => 'Merk Baygon',
                'jenisbarang_id' => 13, //KB
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Merk barang untuk kategori Listrik (LS)
            [
                'merk_id' => 30,
                'merk_nama' => 'Universal',
                'merk_slug' => 'ls-universal',
                'merk_keterangan' => 'Merk barang universal (tanpa merek)',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 31,
                'merk_nama' => 'Philips',
                'merk_slug' => 'philips',
                'merk_keterangan' => 'Merk Philips',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 32,
                'merk_nama' => 'Nitto',
                'merk_slug' => 'nitto',
                'merk_keterangan' => 'Merk Nitto',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 33,
                'merk_nama' => 'Supprime',
                'merk_slug' => 'supprime',
                'merk_keterangan' => 'Merk Supprime',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 34,
                'merk_nama' => 'Halopika',
                'merk_slug' => 'halopika',
                'merk_keterangan' => 'Merk Halopika',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 35,
                'merk_nama' => 'Briliant',
                'merk_slug' => 'briliant',
                'merk_keterangan' => 'Merk Briliant',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 36,
                'merk_nama' => 'Schneider',
                'merk_slug' => 'schneider',
                'merk_keterangan' => 'Merk Schneider',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 37,
                'merk_nama' => 'Omron',
                'merk_slug' => 'omron',
                'merk_keterangan' => 'Merk Omron',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 38,
                'merk_nama' => 'Rexco',
                'merk_slug' => 'rexco',
                'merk_keterangan' => 'Merk Rexco',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 39,
                'merk_nama' => 'Berrker',
                'merk_slug' => 'berrker',
                'merk_keterangan' => 'Merk Berrker',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 40,
                'merk_nama' => 'Broco',
                'merk_slug' => 'broco',
                'merk_keterangan' => 'Merk Broco',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 41,
                'merk_nama' => 'Panasonic',
                'merk_slug' => 'panasonic-ls',
                'merk_keterangan' => 'Merk Panasonic',
                'jenisbarang_id' => 14, //LS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Merk barang untuk kategori Plumbing (PL)
            [
                'merk_id' => 42,
                'merk_nama' => 'Universal',
                'merk_slug' => 'pl-universal',
                'merk_keterangan' => 'Merk barang universal (tanpa merek)',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 43,
                'merk_nama' => 'Toto',
                'merk_slug' => 'toto',
                'merk_keterangan' => 'Merk Toto',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 44,
                'merk_nama' => 'Kitz',
                'merk_slug' => 'kitz',
                'merk_keterangan' => 'Merk Kitz',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 45,
                'merk_nama' => 'Onda',
                'merk_slug' => 'onda',
                'merk_keterangan' => 'Merk Onda',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 46,
                'merk_nama' => 'Wasser',
                'merk_slug' => 'wasser',
                'merk_keterangan' => 'Merk Wasser',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 47,
                'merk_nama' => 'Kuda Bintang',
                'merk_slug' => 'kuda-bintang',
                'merk_keterangan' => 'Merk Kuda Bintang',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 48,
                'merk_nama' => 'Omega',
                'merk_slug' => 'omega',
                'merk_keterangan' => 'Merk Omega',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 49,
                'merk_nama' => 'Rucika',
                'merk_slug' => 'rucika',
                'merk_keterangan' => 'Merk Rucika',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 50,
                'merk_nama' => 'Isarplas',
                'merk_slug' => 'isarplas',
                'merk_keterangan' => 'Merk Isarplas',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 51,
                'merk_nama' => 'Lupex',
                'merk_slug' => 'lupex',
                'merk_keterangan' => 'Merk Lupex',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 52,
                'merk_nama' => 'American Standard',
                'merk_slug' => 'american-standard',
                'merk_keterangan' => 'Merk American Standard',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 53,
                'merk_nama' => 'Aslas',
                'merk_slug' => 'aslas',
                'merk_keterangan' => 'Merk Aslas',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 54,
                'merk_nama' => 'San-Ei',
                'merk_slug' => 'san-ei',
                'merk_keterangan' => 'Merk San-ei',
                'jenisbarang_id' => 15, //PL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Merk barang untuk kategori Sipil (SPL)
            [
                'merk_id' => 55,
                'merk_nama' => 'Universal',
                'merk_slug' => 'spl-universal',
                'merk_keterangan' => 'Merk barang universal (tanpa merek)',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 56,
                'merk_nama' => 'Unnu',
                'merk_slug' => 'unnu',
                'merk_keterangan' => 'Merk Unnu',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 57,
                'merk_nama' => 'Narita',
                'merk_slug' => 'narita',
                'merk_keterangan' => 'Merk Narita',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 58,
                'merk_nama' => 'Dorma',
                'merk_slug' => 'dorma',
                'merk_keterangan' => 'Merk Dorma',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 59,
                'merk_nama' => 'Soligen',
                'merk_slug' => 'soligen',
                'merk_keterangan' => 'Merk Soligen',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 60,
                'merk_nama' => 'Hapele',
                'merk_slug' => 'hapele',
                'merk_keterangan' => 'Merk Hapele',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 61,
                'merk_nama' => 'Dekson',
                'merk_slug' => 'dekson',
                'merk_keterangan' => 'Merk Dekson',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 62,
                'merk_nama' => 'Solid',
                'merk_slug' => 'solid',
                'merk_keterangan' => 'Merk Solid',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 63,
                'merk_nama' => 'Dextone',
                'merk_slug' => 'dextone',
                'merk_keterangan' => 'Merk Dextone',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 64,
                'merk_nama' => 'Aibon',
                'merk_slug' => 'aibon',
                'merk_keterangan' => 'Merk Aibon',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 65,
                'merk_nama' => 'Isarplast',
                'merk_slug' => 'isarplast-spl',
                'merk_keterangan' => 'Merk Isarplast',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 66,
                'merk_nama' => 'Vitech',
                'merk_slug' => 'vitech',
                'merk_keterangan' => 'Merk Vitech',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 67,
                'merk_nama' => 'FRT',
                'merk_slug' => 'frt',
                'merk_keterangan' => 'Merk FRT',
                'jenisbarang_id' => 16, //SPL
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Merk barang untuk kategori Telepon (TLP)
            [
                'merk_id' => 68,
                'merk_nama' => 'Universal',
                'merk_slug' => 'tlp-universal',
                'merk_keterangan' => 'Merk barang universal (tanpa merek)',
                'jenisbarang_id' => 17, //TLP
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 69,
                'merk_nama' => 'Belden',
                'merk_slug' => 'belden',
                'merk_keterangan' => 'Merk Belden',
                'jenisbarang_id' => 17, //TLP
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 70,
                'merk_nama' => 'Alcatel',
                'merk_slug' => 'alcatel',
                'merk_keterangan' => 'Merk Alcatel',
                'jenisbarang_id' => 17, //TLP
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk_id' => 71,
                'merk_nama' => 'Panasonic',
                'merk_slug' => 'panasonic-tlp',
                'merk_keterangan' => 'Merk Panasonic',
                'jenisbarang_id' => 17, //TLP
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
