<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_submenu')->insert([
            [
                'submenu_id' => 9,
                'menu_id' => '3',
                'submenu_judul' => 'Barang Masuk',
                'submenu_slug' => 'barang-masuk',
                'submenu_redirect' => '/barang-masuk',
                'submenu_sort' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            // [
            //     'submenu_id' => 10,
            //     'menu_id' => '3',
            //     'submenu_judul' => 'Barang Keluar',
            //     'submenu_slug' => 'barang-keluar',
            //     'submenu_redirect' => '/barang-keluar',
            //     'submenu_sort' => '2',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],
            [
                'submenu_id' => 11,
                'menu_id' => '3',
                'submenu_judul' => 'Approval',
                'submenu_slug' => 'approve',
                'submenu_redirect' => '/approve',
                'submenu_sort' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'submenu_id' => 17,
                'menu_id' => '2',
                'submenu_judul' => 'Jenis',
                'submenu_slug' => 'jenis',
                'submenu_redirect' => '/jenisbarang',
                'submenu_sort' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'submenu_id' => 18,
                'menu_id' => '2',
                'submenu_judul' => 'Satuan',
                'submenu_slug' => 'satuan',
                'submenu_redirect' => '/satuan',
                'submenu_sort' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'submenu_id' => 19,
                'menu_id' => '2',
                'submenu_judul' => 'Merk',
                'submenu_slug' => 'merk',
                'submenu_redirect' => '/merk',
                'submenu_sort' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'submenu_id' => 20,
                'menu_id' => '2',
                'submenu_judul' => 'Barang',
                'submenu_slug' => 'barang',
                'submenu_redirect' => '/barang',
                'submenu_sort' => '4',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'submenu_id' => 21,
                'menu_id' => '7',
                'submenu_judul' => 'Lap Barang Masuk',
                'submenu_slug' => 'lap-barang-masuk',
                'submenu_redirect' => '/lap-barang-masuk',
                'submenu_sort' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            // [
            //     'submenu_id' => 22,
            //     'menu_id' => '7',
            //     'submenu_judul' => 'Lap Barang Keluar',
            //     'submenu_slug' => 'lap-barang-keluar',
            //     'submenu_redirect' => '/lap-barang-keluar',
            //     'submenu_sort' => '2',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ],
            [
                'submenu_id' => 23,
                'menu_id' => '7',
                'submenu_judul' => 'Lap Stok Barang',
                'submenu_slug' => 'lap-stok-barang',
                'submenu_redirect' => '/lap-stok-barang',
                'submenu_sort' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'submenu_id' => 24, // ID berikutnya setelah 23
                'menu_id' => '4', // Sesuai menu_id Request Barang
                'submenu_judul' => 'Request Barang',
                'submenu_slug' => 'request-barang',
                'submenu_redirect' => '/admin/request-barang',
                'submenu_sort' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
