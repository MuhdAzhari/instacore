<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Settings\GeneralSettings;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = app(GeneralSettings::class);

        $settings->site_name = 'InstaCore';
        $settings->company_email = 'admin@instacore.com';
        $settings->timezone = 'Asia/Kuala_Lumpur';
        $settings->maintenance_mode = false;

        $settings->save();
    }
}

