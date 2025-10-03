<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productsCount = Product::count();
        $categoriesCount = Category::count();
        return view('admin.dashboard', compact('productsCount','categoriesCount'));
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
