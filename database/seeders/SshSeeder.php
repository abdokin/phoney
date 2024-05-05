<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ssh;
use Faker\Factory as Faker;

class SShSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Populate the sshs table with dummy data
        foreach (range(1, 100) as $index) {
            Ssh::create([
                'remoteAddr' => $faker->ipv4,
                'username' => $faker->userName,
                'password' => $faker->password,
                'client_version' => $faker->randomFloat(1, 1, 10),
                'pwned' => $faker->boolean,
            ]);
            Ssh::create([
                'remoteAddr' => $faker->ipv4,
                'username' => $faker->userName,
                'password' => $faker->password,
                'client_version' => $faker->randomFloat(1, 1, 10),
                'pwned' => $faker->boolean,
            ]);
        }
    }
}
