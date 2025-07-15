<?php

namespace App\Listeners;

use OwenIt\Auditing\Models\Audit;
use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        Audit::create([
            'user_id' => $event->user->id,
            'event' => 'logout',
            'auditable_type' => get_class($event->user),
            'auditable_id' => $event->user->id,
            'old_values' => [],
            'new_values' => ['logged_out_at' => now()],
            'url' => request()->fullUrl(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
