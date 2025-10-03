<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    // عرض جميع المنتجات

public function index()
{
    return ProductResource::collection(Product::all());
}

    // عرض نموذج إضافة منتج جديد
    public function create()
    {
        return view('admin.products.create-product');
    }

    // حفظ المنتج الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'on_sale' => 'sometimes|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        $validated['on_sale'] = $request->has('on_sale') ? 1 : 0;

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // عرض تفاصيل منتج واحد
    public function show(Product $product)
    {
        return view('admin.products.show-product', compact('product'));
    }

    // عرض نموذج تعديل المنتج
    public function edit(Product $product)
    {    
        $product= new Product();
        return view('admin.products.edit-product', ['product'=>$product]);
    }

    // تحديث بيانات المنتج
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'on_sale' => 'sometimes|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        $validated['on_sale'] = $request->has('on_sale') ? 1 : 0;

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // حذف المنتج
    public function destroy($id)
    {
        // if ($product->image_path) {
        //     Storage::disk('public')->delete($product->image_path);
        // }
        $product=Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
