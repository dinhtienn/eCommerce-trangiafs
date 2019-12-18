<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;

class ProductController extends FrontendController
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $product_id = $request->get('product_id');
        if (!empty($search)) {
            return $this->searchProductResult($search);
        }
        if (!empty($product_id)) {
            return $this->productDetail($product_id);
        }
        $all_products = Product::all();
        $list_categories = $this->processCategory($all_products);
        $all_categories = Category::all();
        return view('pages.product', compact('all_products', 'list_categories', 'all_categories'));
    }

    public function quickView(Request $request)
    {
        $product = Product::findOrFail($request->get('id'));
        $product->images;
        return response()->json($product);
    }

    private function processCategory($list_products)
    {
        $list_categories = [];
        foreach ($list_products as $product) {
            $index = $list_products->search($product);
            $list_categories[$index] = [];
            if ($product->category->parent !== null) {
                array_push($list_categories[$index], $product->category->parent->name);
            }
            array_push($list_categories[$index], $product->category->name);
        }
        return $list_categories;
    }

    private function searchProductResult($search_word)
    {
        $all_products = Product::where('name', 'like', "%$search_word%")->get();
        $list_categories = $this->processCategory($all_products);
        $all_categories = Category::all();
        return view('pages.product', compact('all_products', 'list_categories', 'all_categories'));
    }

    private function productDetail($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('pages.product-detail', compact('product'));
    }

    public function checkout()
    {
        return view('pages.checkout');
    }
}
