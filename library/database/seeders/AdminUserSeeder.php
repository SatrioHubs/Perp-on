<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'jihn',
            'email' => 'jihndoe@gmail.com',
            'password' => Hash::make('44444444'), // Ganti dengan password yang lebih kuat di produksi
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'ling',
            'email' => 'linglung@gmail.com',
            'password' => Hash::make('putamadre'),
            'role' => 'student',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}