<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Laravel untuk Pemula',
            'author' => 'Budi Santoso',
            'stock' => 5,
        ]);
        Book::create([
            'title' => 'Pemrograman Web Lanjut',
            'author' => 'Siti Aminah',
            'stock' => 3,
        ]);
        Book::create([
            'title' => 'Database Modern',
            'author' => 'Andi Wijaya',
            'stock' => 2,
        ]);
    }
}
