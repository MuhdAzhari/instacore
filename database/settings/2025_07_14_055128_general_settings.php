<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'InstaCore');
        $this->migrator->add('general.company_email', 'admin@instacore.com');
        $this->migrator->add('general.timezone', 'Asia/Kuala_Lumpur');
        $this->migrator->add('general.maintenance_mode', false);
    }
};
