<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\Presenters\UserPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property  string                         $email
 * @property  Role|null                      $role
 * @property int                             $id
 * @property string                          $first_name
 * @property string                          last_name
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string                          $password
 * @property int|null                        $role_id
 * @property string|null                     $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected ?UserPresenter $presenter = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole(array $roles): bool
    {
        $hasRole = array_filter($roles, function ($role) {
            return in_array($role, Role::allRoles()) ?? false;
        });

        return (bool)$hasRole;
    }

    public function present(): UserPresenter
    {
        $this->presenter = $this->presenter ?? new UserPresenter($this);
        return $this->presenter;
    }
}
