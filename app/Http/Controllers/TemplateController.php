<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        return view('shop.index');
    }

    public function show( )
    {
        return view('shop.products');
    }

    public function details()
    {
        return view('shop.product-details');
    }

    public function cart()
    {
        return view('shop.cart');
    }

    public function about()
    {
        return view('shop.about-us');
    }

    public function contact()
    {
        return view('shop.contact');
    }
}
