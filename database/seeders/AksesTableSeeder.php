<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AksesTableSeeder extends Seeder
{
    public function run()
    {
        // Part 1: Menu Permissions for Dashboard
        $this->seedDashboardPermissions();

        // Part 2: Master Barang Menu Permissions
        $this->seedMasterBarangPermissions();

        // Part 3: Customer Menu Permissions
        $this->seedCustomerPermissions();

        // Part 4: Transaksi Menu Permissions
        $this->seedTransaksiPermissions();

        // Part 5: Request Barang Menu Permissions
        $this->seedRequestBarangPermissions(); // Tambahkan ini

        // Part 6: Laporan Menu Permissions
        $this->seedLaporanPermissions();

        // Part 7: Other Menu Permissions (Settings, etc)
        $this->seedOtherMenuPermissions();

        // Part 8: Submenu Permissions
        $this->seedSubmenuPermissions();
    }

    private function seedDashboardPermissions()
    {
        $roles = [1, 2, 3, 4,5]; // Super Admin, Admin, Operator, Manager
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '1667444041',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1667444041',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1667444041',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1667444041',
                    'role_id' => $role_id,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            ]);
        }
    }

    private function seedRequestBarangPermissions()
    {
        $roles = [1, 2, 3, 4, 5]; // Super Admin, Admin, Operator, Manager
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '1675123456', // Sesuaikan dengan menu_id yang dibuat sebelumnya
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1675123456',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1675123456',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1675123456',
                    'role_id' => $role_id,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            ]);
        }
    }

    private function seedMasterBarangPermissions()
    {
        $roles = [1, 2, 3, 4,5];
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '1668509889',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668509889',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668509889',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668509889',
                    'role_id' => $role_id,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            ]);
        }
    }

    private function seedCustomerPermissions()
    {
        $roles = [1, 2, 3, 4 ,5];
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '1669390641',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1669390641',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1669390641',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1669390641',
                    'role_id' => $role_id,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            ]);
        }
    }

    private function seedTransaksiPermissions()
    {
        $roles = [1, 2, 3, 4,5];
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '1668510437',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510437',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510437',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510437',
                    'role_id' => $role_id,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            ]);
        }
    }

    private function seedLaporanPermissions()
    {
        $roles = [1, 2, 3, 4,5];
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '1668510568',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510568',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510568',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1668510568',
                    'role_id' => $role_id,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            ]);
        }
    }

    private function seedSubmenuPermissions()
    {
        $submenuIds = [9, 10,11, 17, 18, 19, 20, 21, 22, 23,24];
        $roles = [1, 2, 3, 4,5];

        foreach ($roles as $role_id) {
            foreach ($submenuIds as $submenu_id) {
                DB::table('tbl_akses')->insert([
                    [
                        'submenu_id' => $submenu_id,
                        'role_id' => $role_id,
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => $submenu_id,
                        'role_id' => $role_id,
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => $submenu_id,
                        'role_id' => $role_id,
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'submenu_id' => $submenu_id,
                        'role_id' => $role_id,
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]
                ]);
            }
        }
    }

    private function seedOtherMenuPermissions()
    {
        $otherMenuIds = range(1, 6); // Settings, Menu, Role, User, Akses, Web
        $roles = [1, 2]; // Only Super Admin and Admin get these permissions

        foreach ($roles as $role_id) {
            foreach ($otherMenuIds as $othermenu_id) {
                DB::table('tbl_akses')->insert([
                    [
                        'othermenu_id' => $othermenu_id,
                        'role_id' => $role_id,
                        'akses_type' => 'view',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'othermenu_id' => $othermenu_id,
                        'role_id' => $role_id,
                        'akses_type' => 'create',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'othermenu_id' => $othermenu_id,
                        'role_id' => $role_id,
                        'akses_type' => 'update',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ],
                    [
                        'othermenu_id' => $othermenu_id,
                        'role_id' => $role_id,
                        'akses_type' => 'delete',
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]
                ]);
            }
        }
    }
}
