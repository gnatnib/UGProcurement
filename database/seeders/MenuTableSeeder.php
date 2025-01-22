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
                'menu_id' => '1667444041',
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
                'menu_id' => '1668509889',
                'menu_judul' => 'Master Barang',
                'menu_slug' => 'master-barang',
                'menu_icon' => 'package',
                'menu_redirect' => '-',
                'menu_sort' => '2',
                'menu_type' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_id' => '1668510437',
                'menu_judul' => 'Transaksi',
                'menu_slug' => 'transaksi',
                'menu_icon' => 'repeat',
                'menu_redirect' => '-',
                'menu_sort' => '4',
                'menu_type' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_id' => '1675123456', // Menu ID baru dengan timestamp yang berbeda
                'menu_judul' => 'Request Barang',
                'menu_slug' => 'request-barang',
                'menu_icon' => 'shopping-cart', // Menggunakan icon yang sesuai
                'menu_redirect' => '/request-barang',
                'menu_sort' => '5',
                'menu_type' => '1', // Tipe 1 untuk menu langsung
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_id' => '1675199999', // Menu ID baru dengan timestamp yang berbeda
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
                'menu_id' => '1668510568',
                'menu_judul' => 'Laporan',
                'menu_slug' => 'laporan',
                'menu_icon' => 'printer',
                'menu_redirect' => '-',
                'menu_sort' => '5',
                'menu_type' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_id' => '1669390641',
                'menu_judul' => 'Customer',
                'menu_slug' => 'customer',
                'menu_icon' => 'user',
                'menu_redirect' => '/customer',
                'menu_sort' => '3',
                'menu_type' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        ]);
    }
}
