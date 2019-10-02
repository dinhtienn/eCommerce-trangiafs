<?php

namespace App\Http\Controllers;

class CompanyController extends FrontendController
{
    public function contact()
    {
        return view('pages.contact');
    }

    public function info()
    {
        return view('pages.info');
    }
}
