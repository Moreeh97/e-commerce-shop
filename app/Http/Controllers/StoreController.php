<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    //
     private function dummyProducts()
    {
        return [
            ['id' => 1, 'name' => 'Product A', 'price' => 49.99, 'on_sale' => true,  'description' => 'Short description A.'],
            ['id' => 2, 'name' => 'Product B', 'price' => 29.99, 'on_sale' => false, 'description' => 'Short description B.'],
            ['id' => 3, 'name' => 'Product C', 'price' => 19.99, 'on_sale' => true,  'description' => 'Short description C.'],
        ];
    }

    public function products()
    {
        $products = $this->dummyProducts();
        return view('shop.products', compact('products'));
    }

    public function productDetails($id)
    {
        $products = $this->dummyProducts();
        $product = collect($products)->firstWhere('id', (int)$id) ?? $products[0];
        return view('shop.product-details', compact('product'));
    }

    public function cart()
    {
        return view('shop.cart');
    }

    public function about()
    {
        $title = 'About Our Store';
        $description = 'We are a small e-commerce shop committed to quality.';
        $rawHtml = '<p><strong>Founded</strong> in 2025. We focus on customer satisfaction.</p>';
        return view('shop.about-us', compact('title', 'description', 'rawHtml'));
    }

    public function contact()
    {
        return view('shop.contact');
    }
}
