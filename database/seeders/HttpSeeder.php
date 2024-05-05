<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Http;
use Faker\Factory as Faker;
class HttpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Populate the http table with dummy data
        foreach (range(1, 100) as $index) {
            Http::create([
                'remoteAddr' => $faker->ipv4,
                'username' => $faker->userName,
                'password' => $faker->password,
                'client_version' => $faker->randomFloat(1, 1, 10),
                'pwned' => $faker->boolean,
            ]);
            Http::create([
                'remoteAddr' => $faker->ipv4,
                'username' => $faker->userName,
                'password' => $faker->password,
                'client_version' => $faker->randomFloat(1, 1, 10),
                'pwned' => $faker->boolean,
            ]);
        }

    }
}
