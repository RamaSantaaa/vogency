<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProducts()
    {
        $user = auth()->user(); // Mengambil user yang sedang login
        $products = Product::all(); // Mengambil semua produk

        return view('products', [
            'title' => 'All Items',
            'user' => $user,
            'products' => $products
        ]);
    }

    public function showMenProducts()
    {
        $user = auth()->user(); // Mengambil user yang sedang login
        $products = Product::where('gender', 'Male')->get(); // Mengambil semua produk dengan category laki laki

        return view('men', [
            'title' => "Men's Stuff",
            'user' => $user,
            'products' => $products
        ]);
    }

    public function showWomanProducts()
    {
        $user = auth()->user(); // Mengambil user yang sedang login
        $products = Product::where('gender', 'Female')->get(); // Mengambil semua produk dengan category perempuan

        return view('woman', [
            'title' => "Woman's Stuff",
            'user' => $user,
            'products' => $products
        ]);
    }

    public function showSingleProduct(Product $product)
    {
        //dd($product);
        $user = auth()->user();
        return view('product', [
            'title' => 'Single Product',
            'product' => $product,
            'user' => $user
        ]);
    }
}
