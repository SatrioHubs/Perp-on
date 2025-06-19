<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
    'name' => 'jhin',
    'email' => 'jhindot@gmail.com',
    'password' => Hash::make('44444444'),
    'role' => 'admin'
    ]);

    User::create([
        'name' => 'ling',
        'email' => 'linglung@gmail.com',
        'password' => Hash::make('putamadre'),
        'role' => 'mahasiswa'
    ]);
    }
}
