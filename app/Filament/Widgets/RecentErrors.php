<?php

namespace App\Filament\Widgets;

use App\Models\Audit;
use Filament\Widgets\Widget;

class RecentErrors extends Widget
{
    protected static string $view = 'filament.widgets.recent-errors';
    protected int|string|array $columnSpan = 'full';

    public function getViewData(): array
    {
        return [
            'errors' => Audit::query()
                ->where('event', 'error')
                ->latest()
                ->take(5)
                ->get(),
        ];
    }
}
