<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property User $user
 * @property string $created_at
 * @property string $updated_at
 */
class Login extends Model
{
    use HasFactory;

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
