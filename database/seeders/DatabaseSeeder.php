<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
//
//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

        $faker = Faker::create();
        $type = $faker->randomElement(['recette', 'depense']);
        foreach (range(1,1) as $index) {
            DB::table('cash_history')->insert([
                'label' => $faker->name(),
                'type' => $type,
                'transaction_amount' => $faker->randomFloat(2, 0, 1000),
                'balance' => $faker->randomFloat(2, 0, 10000),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
            ]);
        }

    }
}
