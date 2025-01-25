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

        //Part 9: Approval Permissions
        $this->seedApprovalPermissions();

        //Part 10: Tracking Status Permissions for HCGA
        $this->seedTrackingStatusPermissions();
    }

    private function seedDashboardPermissions()
    {
        $roles = [1, 2, 3, 4, 5]; // Super Admin, Admin, Operator, Manager
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '1',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '1',
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
        $roles = [5]; // User
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '4', // Sesuaikan dengan menu_id yang dibuat sebelumnya
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '4',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '4',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '4',
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
        $roles = [1, 3]; //Superadmin and Admin HCGA
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '2',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '2',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '2',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '2',
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
        $roles = [];
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '8',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '8',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '8',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '8',
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
        $roles = [];
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '3',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '3',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '3',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '3',
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
        $roles = [1, 2, 3, 4, 5];
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '7',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '7',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '7',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '7',
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
        // Submenu untuk semua role kecuali approval
        $submenuIds = [9, 10, 17, 18, 19, 20, 21, 22, 23, 24];

        // Role user
        $userRole = 5;

        // Role admin dan lainnya
        $adminRoles = [1, 2, 3, 4];

        // Insert permissions untuk semua submenu (kecuali approval) ke semua role
        foreach ([...$adminRoles, $userRole] as $role_id) {
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
        $roles = [1]; // Only Super Admin and Admin get these permissions

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

    private function seedApprovalPermissions()
    {
        $roles = [2, 4]; // GMHCGA, General Manager
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '5', // Sesuaikan dengan menu_id yang dibuat sebelumnya
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '5',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '5',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '5',
                    'role_id' => $role_id,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            ]);
        }
    }

    private function seedTrackingStatusPermissions()
    {
        $roles = [3]; //Hanya GMHCGA dan Admin HCGA
        foreach ($roles as $role_id) {
            DB::table('tbl_akses')->insert([
                [
                    'menu_id' => '6',
                    'role_id' => $role_id,
                    'akses_type' => 'view',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '6',
                    'role_id' => $role_id,
                    'akses_type' => 'create',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '6',
                    'role_id' => $role_id,
                    'akses_type' => 'update',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'menu_id' => '6',
                    'role_id' => $role_id,
                    'akses_type' => 'delete',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
