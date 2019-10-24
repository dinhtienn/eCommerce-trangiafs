<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\TopProduct;

class TopProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_random_product = Product::all()->random(7);
        foreach ($list_random_product as $product) {
            TopProduct::create(['product_id' => $product->id])->save();
        }
    }
}
