<?php 
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name = 'InstaCore';
    public string $company_email = 'admin@instacore.com';
    public string $timezone = 'Asia/Kuala_Lumpur';
    public bool $maintenance_mode = false;

    public static function group(): string
    {
        return 'general';
    }
}
