<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        return view('admin.dashboard', compact('productCount','categoryCount'));
    }

    public function products()
    {
        $products = Product::with('category')->paginate(15);
        return view('admin.products', compact('products'));
    }

    public function categories()
    {
        $categories = Category::withCount('products')->get();
        return view('admin.categories', compact('categories'));
    }
}
