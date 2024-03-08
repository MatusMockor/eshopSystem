<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Services\UploadService\Images\ProductGalleryService;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function __construct(protected ProductGalleryService $productGalleryService)
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

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $product = Product::create($data);
        if ($data['images'] ?? false) {
            $this->productGalleryService->uploadImages($data['images'], $product);
        }

        return to_route('dashboard')->with('success', 'Product successfully created');
    }

    public function edit(Product $product)
    {
        $images = $product->images->map(fn (Image $image) => [
            'image_path' => asset($image->image_path),
            'image_name' => $image->image_name,
        ]);

        return view('dashboard.product.edit', [
            'product'  => $product,
            'images'   => $images,
            'statuses' => Product::getStatuses(),
        ]);
    }

    public function update(StoreProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();
        $product->update($data);

        if ($data['images'] ?? false) {
            $this->productGalleryService->uploadImages($data['images'], $product);
        }

        return to_route('dashboard')->with('success', 'Product successfully updated');
    }

    public function delete(Product $product): RedirectResponse
    {
        $product->delete($product);

        return to_route('dashboard')->with('success', 'Product successfully deleted');
    }
}
