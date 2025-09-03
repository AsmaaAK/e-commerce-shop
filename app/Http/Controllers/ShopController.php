<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index'); // الصفحة الرئيسية للمتجر
    }

    public function cart()
    {
        return view('shop.cart'); // صفحة سلة التسوق
    }

    public function checkout()
    {
        return view('shop.checkout'); // صفحة الدفع / الخروج
    }

    public function details($id)
    {
        return view('shop.details', compact('id')); // صفحة تفاصيل المنتج
    }
}
