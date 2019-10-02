<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 2; $i < 102; $i++) {
            for ($j = 0; $j < 3; $j ++) {
                $random_number = $faker->numberBetween(1, 16);
                DB::table('images')->insert([
                    'product_id' => $i,
                    'link' => "images/test_images/products/product-$random_number.jpg",
                ]);
            }
        }
    }
}
