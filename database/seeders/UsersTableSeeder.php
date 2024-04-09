<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate existing data
        DB::table('users')->truncate();

        // Generate unique user data using Faker
        $faker = Faker::create();

        $users = [];
        for ($i = 0; $i < 100; $i++) {
            $users[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Hash the password
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert the generated data into the database
        DB::table('users')->insert($users);
    }
}
