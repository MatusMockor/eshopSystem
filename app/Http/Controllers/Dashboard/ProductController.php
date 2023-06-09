<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Image;
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
        $images = $product->images->map(fn($image) => /** @var Image $image */
        [
            'image_path' => asset($image->image_path),
            'image_name' => $image->image_name,
        ]);

        return view('dashboard.product.edit', [
            'product'  => $product,
            'images'   => $images,
            'statuses' => Product::getStatuses(),
        ]);
    }

    public function update(StoreProductRequest $request, Product $product) : RedirectResponse
    {
        $this->productRepo->update($product, $request->validated());

        return to_route('dashboard')->with('success', 'Product successfully updated');
    }

    public function delete(Product $product) : RedirectResponse
    {
        $this->productRepo->delete($product);

        return to_route('dashboard')->with('success', 'Product successfully deleted');
    }
}
