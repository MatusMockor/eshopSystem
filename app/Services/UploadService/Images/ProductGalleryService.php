<?php

namespace App\Services\UploadService\Images;

use App\Models\Product;
use App\Services\UploadService\FileUploadService;
use Illuminate\Http\UploadedFile;

class ProductGalleryService extends FileUploadService
{
    protected array $dataForDb = [];
    protected Product $product;

    public function path() : string
    {
        return "public/products/{$this->product->id}";
    }

    public function uploadImages(array $images, Product $product) : void
    {
        $this->product = $product;
        foreach ($images as $image) {
            /** @var UploadedFile $image */
            $path = $this->upload($image);
            $this->dataForDb[] = [
                'image_name' => $image->getClientOriginalName(),
                'image_path' => $path,
                'ext'        => $image->getClientOriginalExtension(),
                'mime'       => $image->getClientMimeType(),
                'size'       => $image->getSize(),
            ];
        }

        $product->images()->createMany($this->dataForDb);
    }
}
