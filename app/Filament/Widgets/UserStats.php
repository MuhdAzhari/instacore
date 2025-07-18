<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStats extends BaseWidget
{
    protected function getStats(): array
    {
       return [
        Stat::make('Total Logins', auth()->user()->activities()->where('event', 'login')->count()),
        Stat::make('Last Login', optional(auth()->user()->activities()->where('event', 'login')->latest()->first())->created_at?->format('d M Y, h:i A') ?? '—'),
        ];
    }
}
