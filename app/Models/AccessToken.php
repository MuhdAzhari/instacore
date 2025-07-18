<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken;

class AccessToken extends PersonalAccessToken
{
    protected $table = 'personal_access_tokens';

    protected $fillable = [
        'name',
        'tokenable_id',
        'tokenable_type',
        'token',
        'abilities',
        'last_used_at',
        'expires_at',
    ];


    public function tokenable()
    {
        return $this->morphTo();
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('tokenable_type', User::class)->where('tokenable_id', $userId);
    }
}
