<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ftp;
use Faker\Factory as Faker;

class FtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Populate the ftps table with dummy data
        foreach (range(1, 100) as $index) {
            Ftp::create([
                'remoteAddr' => $faker->ipv4,
                'username' => $faker->userName,
                'password' => $faker->password,
                'client_version' => $faker->randomFloat(1, 1, 10),
                'pwned' => $faker->boolean,
            ]);
            Ftp::create([
                'remoteAddr' => $faker->ipv4,
                'username' => $faker->userName,
                'password' => $faker->password,
                'client_version' => $faker->randomFloat(1, 1, 10),
                'pwned' => $faker->boolean,
            ]);
        }
    }
}
