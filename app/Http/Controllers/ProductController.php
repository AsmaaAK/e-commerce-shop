<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
    $products = Product::all();
    return view('shop.products', compact('products'));
}

public function show($id) {
    $product = Product::findOrFail($id);
    return view('shop.product-details', compact('product'));
}

public function create() {
    return view('shop.create-product');
}

public function store(Request $request) {
    $validated = $request->validate([
        'name'=>'required|min:2',
        'price'=>'required|numeric|min:0',
        'image'=>'nullable|image|max:2048'
    ]);
    // حفظ المنتج
    $product = new Product($validated);
    if($request->hasFile('image')){
        $product->image_path = $request->file('image')->store('products','public');
    }
    $product->save();
    return redirect('/products')->with('success','تمت إضافة المنتج بنجاح');
}

}
