<?php

namespace App\Filament\Widgets;

use App\Models\Audit;
use Filament\Widgets\Widget;

class RecentLogins extends Widget
{
    protected static string $view = 'filament.widgets.recent-logins';

    protected int|string|array $columnSpan = 'full';

    public function getViewData(): array
    {
        return [
            'logins' => Audit::query()
                ->where('event', 'login')
                ->latest()
                ->take(5)
                ->get(),
        ];
    }
}
