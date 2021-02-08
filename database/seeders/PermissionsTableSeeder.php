<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'daftar_usaha_access',
            ],
            [
                'id'    => 18,
                'title' => 'usaha_create',
            ],
            [
                'id'    => 19,
                'title' => 'usaha_edit',
            ],
            [
                'id'    => 20,
                'title' => 'usaha_show',
            ],
            [
                'id'    => 21,
                'title' => 'usaha_delete',
            ],
            [
                'id'    => 22,
                'title' => 'usaha_access',
            ],
            [
                'id'    => 23,
                'title' => 'pengusaha_create',
            ],
            [
                'id'    => 24,
                'title' => 'pengusaha_edit',
            ],
            [
                'id'    => 25,
                'title' => 'pengusaha_show',
            ],
            [
                'id'    => 26,
                'title' => 'pengusaha_delete',
            ],
            [
                'id'    => 27,
                'title' => 'pengusaha_access',
            ],
            [
                'id'    => 28,
                'title' => 'media_sosial_create',
            ],
            [
                'id'    => 29,
                'title' => 'media_sosial_edit',
            ],
            [
                'id'    => 30,
                'title' => 'media_sosial_show',
            ],
            [
                'id'    => 31,
                'title' => 'media_sosial_delete',
            ],
            [
                'id'    => 32,
                'title' => 'media_sosial_access',
            ],
            [
                'id'    => 33,
                'title' => 'produk_unggulan_create',
            ],
            [
                'id'    => 34,
                'title' => 'produk_unggulan_edit',
            ],
            [
                'id'    => 35,
                'title' => 'produk_unggulan_show',
            ],
            [
                'id'    => 36,
                'title' => 'produk_unggulan_delete',
            ],
            [
                'id'    => 37,
                'title' => 'produk_unggulan_access',
            ],
            [
                'id'    => 38,
                'title' => 'foto_produk_create',
            ],
            [
                'id'    => 39,
                'title' => 'foto_produk_edit',
            ],
            [
                'id'    => 40,
                'title' => 'foto_produk_show',
            ],
            [
                'id'    => 41,
                'title' => 'foto_produk_delete',
            ],
            [
                'id'    => 42,
                'title' => 'foto_produk_access',
            ],
            [
                'id'    => 43,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 44,
                'title' => 'dokumentasi_access',
            ], [
                'id'    => 45,
                'title' => 'dokumentasi_create',
            ], [
                'id'    => 46,
                'title' => 'dokumentasi_edit',
            ],
            [
                'id'    => 47,
                'title' => 'dokumentasi_delete',
            ],
        ];

        Permission::insert($permissions);
    }
}
