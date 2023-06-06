<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Repositories\Interface\ProductRepositoryContract;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function __construct(protected ProductRepositoryContract $productRepo)
    {
    }

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

    public function store(StoreProductRequest $request) : RedirectResponse
    {
        $this->productRepo->create($request->validated());

        return to_route('dashboard')->with('success', 'Product successfully created');
    }
}
