<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Category;
use App\Models\Social;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        View::share('header_data', $this->getHeaderData());
        View::share('footer_data', $this->getFooterData());
    }

    public function getHeaderData()
    {
        $header_data['company_info'] = Company::all();
        return $header_data;
    }

    public function getFooterData()
    {
        $footer_data['category'] = Category::all(['id', 'name']);
        $footer_data['social'] = Social::all();
        return $footer_data;
    }
}
