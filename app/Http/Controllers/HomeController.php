<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FrontendController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use App\Models\TopProduct;

class HomeController extends FrontendController
{
    public function index()
    {
        $slide_images = Slide::all();
        $all_categories = Category::all(['id', 'name']);
        $lastest_products = Product::orderBy('created_at', 'desc')->take(12)->get();
        $top_products = TopProduct::all();

        return view('pages.homepage', compact(
            'slide_images',
            'all_categories',
            'lastest_products',
            'top_products'
        ));
    }
}
