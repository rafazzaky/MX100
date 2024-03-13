<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Perusahaan Satu',
            'email' => 'perusahaansatu@example.com',
            'password' => bcrypt('rahasia'),
            'role' => 'PERUSAHAAN'
        ]);
        User::create([
            'name' => 'Perusahaan Dua',
            'email' => 'perusahaandua@example.com',
            'password' => bcrypt('rahasia'),
            'role' => 'PERUSAHAAN'
        ]);
        User::create([
            'name' => 'Pekerja Satu',
            'email' => 'pekerjasatu@example.com',
            'password' => bcrypt('rahasia'),
            'role' => 'PEKERJA'
        ]);
        User::create([
            'name' => 'Pekerja Dua',
            'email' => 'pekerjadua@example.com',
            'password' => bcrypt('rahasia'),
            'role' => 'PEKERJA'
        ]);
    }
}
