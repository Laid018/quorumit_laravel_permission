<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('products')->insert([
                'name' => $faker->city,
                'description' => $faker->paragraph($nb = 8),
                'price' => $faker->numberBetween($min = 500, $max = 8000)
            ]);
        }
    }
}
