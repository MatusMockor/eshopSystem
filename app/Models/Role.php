<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property Collection $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Role extends Model
{
    use HasFactory;

    const string ADMIN_ROLE = 'admin';

    protected $fillable = [
        'name',
        'slug',
    ];

    public static function allRoles(): array
    {
        return [
            self::ADMIN_ROLE,
        ];
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
