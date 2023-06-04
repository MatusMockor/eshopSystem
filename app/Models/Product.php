<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string  $name
 * @property string  $slug
 * @property string  $description
 * @property double  $price
 * @property integer $quantity
 */
class Product extends Model
{
    use HasFactory;

    // This status indicates that the product is active and displayed on the e-commerce website.
    // Customers can view and purchase it.
    const STATUS_ACTIVE = 'active';
    // This status indicates that the product is inactive and not displayed on the e-commerce website.
    // Customers cannot see or purchase it. This status is often used when you want to temporarily
    // hide a product, such as due to unavailability, repairs, or updates.
    const STATUS_INACTIVE = 'inactive';
    // This status indicates that the product is currently sold out and cannot be purchased. It is displayed
    // on the e-commerce website but without the option to add it to the cart. This status is commonly
    // used to inform customers about the temporary unavailability of a product.
    const STATUS_SOLD_OUT = 'sold_out';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'quantity',
    ];

    public static function getStatuses() : array
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
            self::STATUS_SOLD_OUT,
        ];
    }
}
