<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class UserDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
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
}
