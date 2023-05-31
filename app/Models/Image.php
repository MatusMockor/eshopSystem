<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    protected $fillable = [
        'imageable_type',
        'imageable_id',
    ];

    public function imageable() : MorphTo
    {
        return $this->morphTo();
    }
}
