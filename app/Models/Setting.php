<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $zip_code
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'email',
        'address',
        'city',
        'zip_code',
    ];
}
