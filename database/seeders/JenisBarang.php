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
                'jenisbarang_nama' => 'Alat Tulis Kantor',
                'jenisbarang_slug' => 'atk',
                'jenisbarang_ket' => 'Pulpen, Pensil, Penghapus, Buku Tulis, dll',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenisbarang_id' => 12,
                'jenisbarang_nama' => 'AC',
                'jenisbarang_slug' => 'ac',
                'jenisbarang_ket' => 'Keperluan Air Conditioner (Blower, Freon, V-Belt, dll)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenisbarang_id' => 13,
                'jenisbarang_nama' => 'Kebersihan',
                'jenisbarang_slug' => 'kb',
                'jenisbarang_ket' => 'Barang kebersihan (Sapu, Pel, Sarung Tangan, Sikat, dll)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenisbarang_id' => 14,
                'jenisbarang_nama' => 'Listrik',
                'jenisbarang_slug' => 'ls',
                'jenisbarang_ket' => 'Barang kelistrikan (Kabel, Saklar, Lampu, dll)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenisbarang_id' => 15,
                'jenisbarang_nama' => 'Plumbing',
                'jenisbarang_slug' => 'pl',
                'jenisbarang_ket' => 'Barang plumbing (Pipa, Kran, dll)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenisbarang_id' => 16,
                'jenisbarang_nama' => 'Sipil',
                'jenisbarang_slug' => 'spl',
                'jenisbarang_ket' => 'Alat sipil (Lem-sealant, Semen, dll)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenisbarang_id' => 17,
                'jenisbarang_nama' => 'Telepon',
                'jenisbarang_slug' => 'tlp',
                'jenisbarang_ket' => 'Barang telepon (Kabel Telepon, Telepon Kantor, Rosset, dll)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
