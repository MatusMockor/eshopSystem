<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
        return view('dashboard.product.create', [
            'statuses' => Product::getStatuses(),
        ]);
    }

    public function store(StoreProductRequest $request) : RedirectResponse
    {
        $this->productRepo->create($request->validated());

        return to_route('dashboard')->with('success', 'Product successfully created');
    }

    public function edit(Product $product)
    {
        return view('dashboard.product.edit', [
            'product'  => $product,
            'statuses' => Product::getStatuses(),
        ]);
    }
}
