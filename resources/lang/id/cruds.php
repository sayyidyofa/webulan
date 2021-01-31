<?php

return [
    'userManagement' => [
        'title'          => 'Atur Pengguna',
        'title_singular' => 'Atur Pengguna',
    ],
    'permission'     => [
        'title'          => 'Izin',
        'title_singular' => 'Izin',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'           => [
        'title'          => 'Peranan',
        'title_singular' => 'Peran',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'           => [
        'title'          => 'Daftar Pengguna',
        'title_singular' => 'Pengguna',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'daftarUsaha'    => [
        'title'          => 'Daftar Usaha',
        'title_singular' => 'Daftar Usaha',
    ],
    'usaha'          => [
        'title'          => 'Usaha',
        'title_singular' => 'Usaha',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'nama'               => 'Nama',
            'nama_helper'        => 'Nama Usaha',
            'brand'              => 'Brand',
            'brand_helper'       => 'Nama Merk Usaha',
            'deskripsi'          => 'Deskripsi',
            'deskripsi_helper'   => 'Deskripsi Usaha',
            'kategori'           => 'Kategori',
            'kategori_helper'    => 'Kategori usaha',
            'kontak'             => 'Kontak',
            'kontak_helper'      => 'Kontak usaha',
            'alamat'        => 'Alamat usaha',
            'alamat_helper' => 'Silahkan tuliskan alamat lengkap usaha',
            'maps' => 'Link maps',
            'maps_helper' => 'Opsional. Link google maps lokasi usaha',
            'kegiatan'           => 'Kegiatan',
            'kegiatan_helper'    => 'Apakah Pelaku Usaha terkait pernah mengikuti kegiatan terkait UMKM atau pernah menyelenggarakan kegiatan? Jika ada silakan ditulis secara singkat',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'pengusaha'          => 'Pemilik Usaha',
            'pengusaha_helper'   => ' ',
        ],
    ],
    'pengusaha'      => [
        'title'          => 'Pengusaha',
        'title_singular' => 'Pengusaha',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nama'              => 'Nama',
            'nama_helper'       => 'Nama pemilik usaha',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'mediaSosial'    => [
        'title'          => 'Media Sosial',
        'title_singular' => 'Media Sosial',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'link_accname'        => 'Link Akun/Nama Akun',
            'link_accname_helper' => ' ',
            'vendor'              => 'Nama Sosial Media',
            'vendor_helper'       => ' ',
            'usaha'               => 'Usaha',
            'usaha_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'produkUnggulan' => [
        'title'          => 'Produk Unggulan',
        'title_singular' => 'Produk Unggulan',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nama'              => 'Nama',
            'nama_helper'       => 'Nama Produk',
            'deskripsi'         => 'Deskripsi',
            'deskripsi_helper'  => 'Deskripsi singkat produk',
            'usaha'             => 'Usaha',
            'usaha_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'fotoProduk'     => [
        'title'          => 'Foto Produk',
        'title_singular' => 'Foto Produk',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'foto'                   => 'Foto',
            'foto_helper'            => 'Foto produk, bisa lebih dari satu.',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'produk_unggulan'        => 'Produk Unggulan',
            'produk_unggulan_helper' => ' ',
        ],
    ],
];
