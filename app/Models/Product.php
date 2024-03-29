<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * @property string $name
 * @property string $slug
 * @property string $status
 * @property string|null $description
 * @property float $price
 * @property int $category_id
 * @property int $quantity
 * @property Collection $images
 * @property Category $category
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    // This status indicates that the product is active and displayed on the e-commerce website.
    // Customers can view and purchase it.
    public const string STATUS_ACTIVE = 'active';

    // This status indicates that the product is inactive and not displayed on the e-commerce website.
    // Customers cannot see or purchase it. This status is often used when you want to temporarily
    // hide a product, such as due to unavailability, repairs, or updates.
    public const string STATUS_INACTIVE = 'inactive';

    // This status indicates that the product is currently sold out and cannot be purchased. It is displayed
    // on the e-commerce website but without the option to add it to the cart. This status is commonly
    // used to inform customers about the temporary unavailability of a product.
    public const string STATUS_SOLD_OUT = 'sold_out';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'description',
        'price',
        'quantity',
        'category_id',
    ];

    public static function getStatuses(): array
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
            self::STATUS_SOLD_OUT,
        ];
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeWithCategoryName(Builder $builder): Builder
    {
        return $builder->addSelect([
            'category_name' => Category::select('name')->whereColumn('id', 'products.category_id')->limit(1),
        ]);
    }

    public function isStatusActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isStatusInActive(): bool
    {
        return $this->status === self::STATUS_INACTIVE;
    }

    public function isStatusSoldOut(): bool
    {
        return $this->status === self::STATUS_SOLD_OUT;
    }
}
