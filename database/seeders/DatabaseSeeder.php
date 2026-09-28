<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User Contoh
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Admin Utama',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Buat Data Kategori Contoh
        $catPemrograman = Category::create([
            'name'        => 'Pemrograman & IT',
            'description' => 'Buku-buku seputar coding, web development, dan teknologi informasi.'
        ]);

        $catSains = Category::create([
            'name'        => 'Sains & Teknologi',
            'description' => 'Buku tentang ilmu pengetahuan alam, matematika, dan eksperimen.'
        ]);

        $catNovel = Category::create([
            'name'        => 'Novel & Sastra',
            'description' => 'Koleksi karya sastra, novel fiksi, dan cerita inspiratif.'
        ]);

        // 3. Buat Data Buku Contoh (Berelasi dengan Kategori)
        Book::create([
            'category_id' => $catPemrograman->id,
            'user_id'     => $user->id,
            'title'       => 'Pemrograman Web Modern dengan Laravel 12',
            'name'        => 'Pemrograman Web Modern dengan Laravel 12',
            'author'      => 'Syahrizal',
            'harga'       => 120000,
            'stock'       => 15,
            'description' => 'Buku panduan lengkap membangun web dynamic dan RESTful API.'
        ]);

        Book::create([
            'category_id' => $catPemrograman->id,
            'user_id'     => $user->id,
            'title'       => 'Mahir JavaScript ES6 & Vue.js',
            'name'        => 'Mahir JavaScript ES6 & Vue.js',
            'author'      => 'Asep',
            'harga'       => 95000,
            'stock'       => 8,
            'description' => 'Panduan praktis pengembangan frontend web modern.'
        ]);

        Book::create([
            'category_id' => $catSains->id,
            'user_id'     => $user->id,
            'title'       => 'Pengantar Fisika Kuantum',
            'name'        => 'Pengantar Fisika Kuantum',
            'author'      => 'Dr. Budi Santoso',
            'harga'       => 110000,
            'stock'       => 5,
            'description' => 'Dasar-dasar teori kuantum dan aplikasinya.'
        ]);

        Book::create([
            'category_id' => $catNovel->id,
            'user_id'     => $user->id,
            'title'       => 'Laskar Pelangi',
            'name'        => 'Laskar Pelangi',
            'author'      => 'Andrea Hirata',
            'harga'       => 85000,
            'stock'       => 20,
            'description' => 'Kisah inspiratif anak-anak di Belitung.'
        ]);
    }
}