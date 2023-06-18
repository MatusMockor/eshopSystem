<?php

namespace App\Services\UploadService;

use Illuminate\Http\UploadedFile;

abstract class FileUploadService
{
    abstract public function path() : string;

    protected function upload(UploadedFile $file) : string
    {
        return $file->storePublicly($this->path());
    }
}
