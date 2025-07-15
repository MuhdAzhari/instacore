<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Support\Facades\Auth;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function create(bool $shouldRedirect = true): void
    {
        try {
            parent::create($shouldRedirect);
        } catch (\Exception $e) {
            Audit::create([
                'user_id' => Auth::id(),
                'event' => 'error',
                'auditable_type' => static::class,
                'auditable_id' => null,
                'old_values' => [],
                'new_values' => [],
                'url' => request()->fullUrl(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'tags' => ['create_user_error'],
                'created_at' => now(),
            ]);

            throw $e;
        }
    }
}
