<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Spatie\LaravelSettings\Settings;
use App\Settings\GeneralSettings;

class SystemInfo extends Widget
{
    protected static string $view = 'filament.widgets.system-info';
    protected int|string|array $columnSpan = 'full';

    public function getViewData(): array
    {
        /** @var GeneralSettings $settings */
        $settings = app(GeneralSettings::class);

        return [
        'siteName'         => $settings->site_name,
        'laravelVersion'   => \Illuminate\Foundation\Application::VERSION,
        'phpVersion'       => PHP_VERSION,
        'filamentVersion'  => \Composer\InstalledVersions::getPrettyVersion('filament/filament'),
        'apacheVersion'    => function_exists('apache_get_version') ? apache_get_version() : 'N/A',
        'timezone'         => config('app.timezone'),
        'maintenanceMode'  => $this->isMaintenanceModeOn(),
        ];
    }

    protected function isMaintenanceModeOn(): bool
    {
        return File::exists(storage_path('framework/down'));
    }
}
