<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class Profile extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?int $navigationSort = -98;
    protected static ?string $navigationGroup = null;
    protected static ?string $title = 'My Profile';
    protected static string $view = 'filament.pages.profile';

    public ?array $data = [];

    public function mount(): void
    {
        $user = auth()->user();
        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
            'profile_photo_path' => $user->profile_photo_path,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('profile_photo_path')
                ->label('Profile Photo')
                ->image()
                ->directory('profile-photos')
                ->imageEditor()
                ->avatar()
                ->previewable()
                ->avatar()
                ->previewable()
                ->deletable()
                ->visibility('public') // Important!
                ->columnSpanFull(),

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
        $state = $this->form->getState();

        $user->name = $state['name'];

        // ✅ Delete old profile photo if replaced or cleared
        $oldPhoto = $user->getOriginal('profile_photo_path');
        $newPhoto = $state['profile_photo_path'] ?? null;

        if ($oldPhoto && $oldPhoto !== $newPhoto) {
            Storage::disk('public')->delete($oldPhoto);
        }

        // ✅ Set new profile photo or null
        $user->profile_photo_path = $newPhoto;

        // ✅ Update password if entered
        if (!empty($state['password'])) {
            $user->password = Hash::make($state['password']);
        }

        $user->save();

        Notification::make()
            ->title('Profile updated successfully.')
            ->success()
            ->send();
    }


}
