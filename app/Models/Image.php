<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $size
 * @property string $ext
 * @property string $mime
 * @property string $image_path
 * @property string $image_name
 * @property bool $is_featured
 */
class Image extends Model
{
    protected $fillable = [
        'image_name',
        'image_path',
        'size',
        'mime',
        'ext',
        'is_featured',
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
