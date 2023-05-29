<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate();

        return view('dashboard.product.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('dashboard.product.create');
    }
}
