<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $imageContent = file_get_contents($faker->imageUrl(640, 480, 'people', true, 'Faker'));
            $imageName = 'pegawai_' . $i . '.jpg';
            Storage::disk('public')->put('uploads/' . $imageName, $imageContent);

            Pegawai::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'position' => $faker->randomElement(['Manager', 'Supervisor', 'Staff', 'Intern']),
                'photo' => $imageName
            ]);
        }
    }
}
