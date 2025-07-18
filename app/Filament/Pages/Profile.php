<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class Profile extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $title = 'My Profile';
    protected static string $view = 'filament.pages.profile';

    public ?array $data = [];

    public function mount(): void
    {
        $user = auth()->user();
        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profile Info')
                    ->schema([
                        TextInput::make('name')->required()->maxLength(255),
                        TextInput::make('email')->email()->disabled(),
                    ])->columns(2),

                Section::make('Update Password')
                    ->schema([
                        TextInput::make('password')
                            ->password()
                            ->label('New Password')
                            ->minLength(8)
                            ->nullable(),

                        TextInput::make('password_confirmation')
                            ->password()
                            ->label('Confirm Password')
                            ->same('password')
                            ->nullable(),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $user = auth()->user();

        $user->name = $this->form->getState()['name'];

        if ($password = $this->form->getState()['password']) {
            $user->password = Hash::make($password);
        }

        $user->save();

        Notification::make()
            ->title('Profile updated successfully.')
            ->success()
            ->send();
    }
}
