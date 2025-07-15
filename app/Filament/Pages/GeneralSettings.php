<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;

use App\Settings\GeneralSettings as Settings;
use Filament\Forms\Concerns\InteractsWithForms;

class GeneralSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'System Management';
    protected static string $view = 'filament.pages.general-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = app(Settings::class);

        $this->form->fill([
            'data' => [
                'site_name' => $settings->site_name,
                'company_email' => $settings->company_email,
                'timezone' => $settings->timezone,
                'maintenance_mode' => $settings->maintenance_mode,
            ],
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Group::make([
                Forms\Components\TextInput::make('data.site_name')->required(),
                Forms\Components\TextInput::make('data.company_email')->email()->required(),
                Forms\Components\TextInput::make('data.timezone')->default('Asia/Kuala_Lumpur'),
                Forms\Components\Toggle::make('data.maintenance_mode')->label('Maintenance Mode'),
            ]),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState()['data'];

        /** @var Settings $settings */
        $settings = app(Settings::class);
        $settings->site_name = $data['site_name'];
        $settings->company_email = $data['company_email'];
        $settings->timezone = $data['timezone'];
        $settings->maintenance_mode = $data['maintenance_mode'];
        $settings->save();

        // ✅ Show notification after save
            Notification::make()
                ->title('Saved successfully')
                ->success() // ✅ Green check style
                ->duration(3000) // Optional: 3 seconds
                ->send();
            
            }
}
