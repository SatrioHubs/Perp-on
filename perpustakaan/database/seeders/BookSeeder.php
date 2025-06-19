<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder {
    public function run(): void {
        Book::create([
            'judul' => 'Belajar Laravel',
            'penulis' => 'John Doe',
            'stok' => 5
        ]);
    }
}
