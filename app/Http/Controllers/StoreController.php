<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $products = [
        1 => [
            'id' => 1,
            'name' => 'Leather Jacket',
            'price' => 120.00,
            'on_sale' => true,
            'description' => 'A stylish leather jacket perfect for winter.',
            'category' => 'Jackets',

            'images' => [
                'images/product-detail-01.jpg',
                'images/product-detail-02.jpg',
                'images/product-detail-03.jpg',
            ],
        ],
        2 => [
            'id' => 2,
            'name' => 'Casual Sneakers',
            'price' => 80.00,
            'on_sale' => false,
            'description' => 'Comfortable casual sneakers for everyday wear.',
            'category' => 'Shoes',
            'images' => [
                'images/product-detail-04.jpg',
                'images/product-detail-05.jpg',
            ],
        ],
        3 => [
        'id' => 3,
        'name' => 'Denim Jeans',
        'price' => 49.99,
        'on_sale' => true,
        'description' => 'Durable denim jeans.',
        'category' => 'Pants',
    ],
    ];

    public function show($id)
    {
        if (!isset($this->products[$id])) {
            abort(404); // إذا المنتج غير موجود
        }

        $product = $this->products[$id];

        return view('shop.product-detail', compact('product'));
    }

    public function index()
    {
        $products = $this->products;
        return view('shop.products', compact('products'));
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
