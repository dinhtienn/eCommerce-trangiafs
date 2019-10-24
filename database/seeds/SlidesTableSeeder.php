<?php

use Illuminate\Database\Seeder;
use App\Models\Slide;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_images = [
            [
                'title' => 'Men Collection 2019',
                'description' => 'NEW SEASON',
                'link' => 'https://google.com',
                'images' => '/images/banner/banner-01.jpg'
            ],
            [
                'title' => 'Womenen Collection 2019',
                'link' => 'https://facebook.com',
                'images' => '/images/banner/banner-02.jpg'
            ]
        ];
        foreach ($list_images as $image) {
            Slide::create($image)->save();
        }
    }
}
