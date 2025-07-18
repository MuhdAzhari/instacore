<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class UserDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?int $navigationSort = -99; // Very high priority (top)
    protected static ?string $navigationGroup = null;
    protected static ?string $title = 'User Dashboard';
    protected static string $view = 'filament.pages.user-dashboard';

    public static function canAccess(): bool
    {
        return auth()->user()?->hasAnyRole(['user', 'manager', 'vendor']);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->hasAnyRole(['user', 'manager', 'vendor']);
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\WelcomeWidget::class,
            \App\Filament\Widgets\UserStats::class,
            \App\Filament\Widgets\RecentUserActivity::class,
        ];
    }
}
