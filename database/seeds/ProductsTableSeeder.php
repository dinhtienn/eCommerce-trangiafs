<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Product::create([
                'name' => $faker->text(18),
                'categories_id' => $faker->numberBetween(1, 7),
                'price' => $faker->numberBetween(0, 999999),
                'description' => $faker->text(300),
                'short_description' => $faker->sentence(),
            ])->save();
        }
    }
}