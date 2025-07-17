<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AdminDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $title = 'Dashboard';
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?int $navigationSort = -1;

    protected static string $view = 'filament.pages.admin-dashboard';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->hasRole(['admin', 'Super Admin']);
    }

    protected function getHeaderWidgets(): array
    {
        return [
             \App\Filament\Widgets\SystemInfo::class,
            \App\Filament\Widgets\UserOverview::class,
             \App\Filament\Widgets\RecentLogins::class,
        ];
    }
}
