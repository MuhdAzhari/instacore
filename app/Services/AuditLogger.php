<?php

namespace App\Services;

use App\Models\Audit;
use Illuminate\Support\Facades\Request;

class AuditLogger
{
    public static function error(string $message, ?int $userId = null): void
    {
        Audit::create([
            'user_id'     => $userId ?? auth()->id(),
            'event'       => 'error',
            'url'         => Request::fullUrl(),
            'ip_address'  => Request::ip(),
            'user_agent'  => Request::header('User-Agent'),
            'tags'        => $message,
        ]);
    }
}
