<?php

namespace Database\Seeders;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LamaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $pekerjaUserIds = User::where('role', 'PEKERJA')->pluck('id')->toArray();
        $existingLowonganIds = Lowongan::pluck('id')->toArray();

        
        for($i = 0; $i < 200; $i++)
        {
            $fakeCvPath = $faker->name.'-CV.pdf';
            Lamaran::create([
                'cv' => $fakeCvPath,
                'lowongan_id' => $faker->randomElement($existingLowonganIds),
                'user_id' => $faker->randomElement($pekerjaUserIds),
            ]);
        }
    }
}
