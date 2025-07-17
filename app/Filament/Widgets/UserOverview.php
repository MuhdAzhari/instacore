<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()),
            Stat::make('Active Users', User::where('status', 'active')->count())
                ->description('Users currently active')
                ->color('success'),
            Stat::make('Inactive Users', User::where('status', 'inactive')->count())
                ->description('Users currently inactive')
                ->color('danger'),
        ];
    }
}
