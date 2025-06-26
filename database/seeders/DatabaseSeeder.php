<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama'     => 'Administrator',
            'email'    => 'admin@gmail.com',
            'role'     => '1', // SuperAdmin
            'status'   => 1,   // Aktif
            'hp'       => '0812345678901',
            'password' => bcrypt('Admin123'),
        ]);

        // Untuk record berikutnya silahkan beri nilai berbeda
        // pada: nama, email, hp dengan masing-masing anggota kelompok
        User::create([
            'nama'     => 'Sopian Aji',
            'email'    => 'sopian4ji@gmail.com',
            'role'     => '0', // Admin
            'status'   => 1,
            'hp'       => '081234567892',
            'password' => bcrypt('P@55word'),
        ]);

        User::create([
            'nama'     => 'Rousyati',
            'email'    => 'rousyati@gmail.com',
            'role'     => '0', // Admin
            'status'   => 0,
            'hp'       => '081234564542',
            'password' => bcrypt('P@55word'),
        ]);

        User::create([
            'nama'     => 'Husni Faqih',
            'email'    => 'husni@gmail.com',
            'role'     => '0', // Admin
            'status'   => 0,
            'hp'       => '089634567892',
            'password' => bcrypt('P@55word'),
        ]);

        #data kategori
        Kategori::create([
            'nama_kategori' => 'Brownies',
        ]);
        Kategori::create([
            'nama_kategori' => 'Combro',
        ]);
        Kategori::create([
            'nama_kategori' => 'Dawet',
        ]);
        Kategori::create([
            'nama_kategori' => 'Mochi',
        ]);
        Kategori::create([
            'nama_kategori' => 'Wingko',
        ]);
    }
}