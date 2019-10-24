<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

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
                'name' => $item,
                'image' => '/images/test_images/gallery-02.jpg',
                'depth' => 1
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
                'depth' => 2,
                'image' => '/images/test_images/gallery-02.jpg',
            ]);
        }

        foreach ($list_categories as $category) {
            Category::create($category)->save();
        }
    }
}
