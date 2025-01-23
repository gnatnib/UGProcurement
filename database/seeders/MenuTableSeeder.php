<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_menu')->insert([
            [
                'menu_id' => '1',
                'menu_judul' => 'Dashboard',
                'menu_slug' => 'dashboard',
                'menu_icon' => 'home',
                'menu_redirect' => '/dashboard',
                'menu_sort' => '1',
                'menu_type' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_id' => '2',
                'menu_judul' => 'Master Barang',
                'menu_slug' => 'master-barang',
                'menu_icon' => 'package',
                'menu_redirect' => '-',
                'menu_sort' => '6',
                'menu_type' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_id' => '3',
                'menu_judul' => 'Transaksi',
                'menu_slug' => 'transaksi',
                'menu_icon' => 'repeat',
                'menu_redirect' => '-',
                'menu_sort' => '5',
                'menu_type' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_id' => '4', // Menu ID baru dengan timestamp yang berbeda
                'menu_judul' => 'Request Barang',
                'menu_slug' => 'request-barang',
                'menu_icon' => 'shopping-cart', // Menggunakan icon yang sesuai
                'menu_redirect' => '/request-barang',
                'menu_sort' => '4',
                'menu_type' => '1', // Tipe 1 untuk menu langsung
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_id' => '5', // Menu ID baru dengan timestamp yang berbeda
                'menu_judul' => 'Approval',
                'menu_slug' => 'approval',
                'menu_icon' => 'check-square', // Menggunakan icon yang sesuai
                'menu_redirect' => '/approval',
                'menu_sort' => '2',
                'menu_type' => '1', // Tipe 1 untuk menu langsung
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_id' => '6', // Menu ID baru dengan timestamp yang berbeda
                'menu_judul' => 'Tracking Status',
                'menu_slug' => 'tracking-status',
                'menu_icon' => 'truck', // Menggunakan icon yang sesuai
                'menu_redirect' => '/tracking',
                'menu_sort' => '1',
                'menu_type' => '1', // Tipe 1 untuk menu langsung
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_id' => '7',
                'menu_judul' => 'Laporan',
                'menu_slug' => 'laporan',
                'menu_icon' => 'printer',
                'menu_redirect' => '-',
                'menu_sort' => '7',
                'menu_type' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            // [
            //     'menu_id' => '8',
            //     'menu_judul' => 'Customer',
            //     'menu_slug' => 'customer',
            //     'menu_icon' => 'user',
            //     'menu_redirect' => '/customer',
            //     'menu_sort' => '3',
            //     'menu_type' => '1',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ]

        ]);
    }
}
