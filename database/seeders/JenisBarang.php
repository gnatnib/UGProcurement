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
                'jenisbarang_nama' => 'Perangkat Elektronik',
                'jenisbarang_slug' => 'perangkat-elektronik',
                'jenisbarang_ket' => 'Laptop, Printer, Scanner, dll',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenisbarang_id' => 13,
                'jenisbarang_nama' => 'Furnitur',
                'jenisbarang_slug' => 'furnitur',
                'jenisbarang_ket' => 'Meja, Kursi, Lemari, dll',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenisbarang_id' => 14,
                'jenisbarang_nama' => 'Perlengkapan Kebersihan',
                'jenisbarang_slug' => 'perlengkapan-kebersihan',
                'jenisbarang_ket' => 'Sapu, Pel, Ember, dll',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenisbarang_id' => 15,
                'jenisbarang_nama' => 'Peralatan Pantry',
                'jenisbarang_slug' => 'peralatan-pantry',
                'jenisbarang_ket' => 'Gelas, Piring, Sendok, dll',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenisbarang_id' => 16,
                'jenisbarang_nama' => 'Perlengkapan Keamanan',
                'jenisbarang_slug' => 'perlengkapan-keamanan',
                'jenisbarang_ket' => 'APAR, Helm, Rompi, dll',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
