<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories_depth_1 = ['Nam', 'Nữ', 'Phụ kiện'];
        $categories_depth_2 = ['Quần nam', 'Áo nam', 'Quần nữ', 'Áo nữ'];

        $list_categories = [];
        foreach ($categories_depth_1 as $item) {
            array_push($list_categories, [
                'name' => $item
            ]);
        }

        foreach ($categories_depth_2 as $item) {
            if ($item == 'Quần nam' || $item == 'Áo nam') {
                $parent_id = 1;
            } else {
                $parent_id = 2;
            }
            array_push($list_categories, [
                'name' => $item,
                'parent_id' => $parent_id,
                'depth' => 2
            ]);
        }

        foreach ($list_categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
