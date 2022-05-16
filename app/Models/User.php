<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\{
    Contracts\Auth\MustVerifyEmail,
    Database\Eloquent\Factories\HasFactory,
    Foundation\Auth\User as Authenticatable,
    Notifications\Notifiable,
    Database\Eloquent\SoftDeletes,
    Database\Eloquent\Casts\Attribute,
    Support\Facades\Hash
};

use App\Models\UserPermission;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        SoftDeletes;

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

    /**
     * Encrypt password when save
     */
    public function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make($value)
        );
    }

    /**
     * @return @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPermissions()
    {
        return $this->hasMany(UserPermission::class);
    }
}
