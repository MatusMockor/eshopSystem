<?php

namespace App\Repositories\Implementation;

use App\Models\Product;
use App\Repositories\Interface\ProductRepositoryContract;
use App\Services\UploadService\Images\ProductGalleryService;

class ProductRepository implements ProductRepositoryContract
{

    public function __construct(protected ProductGalleryService $productGalleryService)
    {
    }

    public function create(array $data) : void
    {
        $product = Product::create($data);

        if ($data['images'] ?? false) {
            $this->productGalleryService->uploadImages($data['images'], $product);
        }
    }

    public function update(Product $product, array $data) : void
    {
        if (!isset($data['category_id'])) {
            $data['category_id'] = null;
        }

        $product->update($data);

        if ($data['images'] ?? false) {
            $this->productGalleryService->uploadImages($data['images'], $product);
        }
    }

    public function delete(Product $product) : void
    {
        $product->delete();
    }
}
