<?php

namespace Database\Seeders;

use App\Models\Lowongan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $perusahaanUserIds = User::where('role', 'PERUSAHAAN')->pluck('id')->toArray();

        for($i = 0; $i < 20; $i++)
        {
            Lowongan::create([
                'judul' => $faker->jobTitle,
                'deskripsi' => $faker->paragraph,
                'is_published' => $faker->boolean(),
                'author' => $faker->randomElement($perusahaanUserIds),
            ]);
        }
    }
}
