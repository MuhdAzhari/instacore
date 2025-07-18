<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        'is_active', 
    ];

    protected $casts = [
        'last_used_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function tokenable()
    {
        return $this->morphTo();
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('tokenable_type', User::class)
                     ->where('tokenable_id', $userId);
    }

    // ✅ Optional global scope: only valid & active tokens
    protected static function booted(): void
    {
        static::addGlobalScope('active_and_not_expired', function (Builder $builder) {
            $builder->where('is_active', true)
                    ->where(function ($q) {
                        $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
                    });
        });
    }

    // ✅ Optional helper
    public function isExpired(): bool
    {
        return $this->expires_at !== null && $this->expires_at->isPast();
    }
}
