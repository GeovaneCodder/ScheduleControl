<?php

namespace App\Models;

use App\Models\User;
use Illuminate\{
    Database\Eloquent\Factories\HasFactory,
    Database\Eloquent\Model
};

class UserPermission extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'permission',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
