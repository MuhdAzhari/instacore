<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin
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
    public function handle(Login $event): void
    {
        Audit::create([
            'user_id' => $event->user->id,
            'event' => 'login',
            'auditable_type' => get_class($event->user),
            'auditable_id' => $event->user->id,
            'old_values' => [],
            'new_values' => ['logged_in_at' => now()],
        ]);
    }
}
