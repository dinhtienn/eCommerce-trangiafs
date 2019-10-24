<?php

use Illuminate\Database\Seeder;
use App\Models\Social;

class SocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_social = [
            [
                'social' => 'Facebook',
                'link' => 'https://facebook.com',
            ],
            [
                'social' => 'Instagram',
                'link' => 'https://www.instagram.com',
            ],
            [
                'social' => 'Twitter',
                'link' => 'https://twitter.com',
            ],
        ];
        foreach ($list_social as $social) {
            Social::create($social)->save();
        }
    }
}
