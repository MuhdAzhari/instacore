<?php
namespace App\Services;

use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;

class UserActivityLogger
{
    public static function log(string $event, ?string $description = null): void
    {
        if (!Auth::check()) return;

        UserActivity::create([
            'user_id' => Auth::id(),
            'event' => $event,
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
