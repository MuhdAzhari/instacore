<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Forms\Form;
use Filament\Facades\Filament;
use App\Services\UserActivityLogger;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Placeholder;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Validation\ValidationException;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;

class CustomLogin extends BaseLogin
{
    public function authenticate(): LoginResponse
    {
        $state = $this->form->getState();

        $user = User::where('email', $state['email'])->first();

        if (! $user || ! Hash::check($state['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => __('filament-panels::pages/auth/login.messages.failed'),
            ]);
        }

        if (! $user->is_active) {
            Notification::make()
                ->title('Your account is inactive.')
                ->body('Please contact the administrator.')
                ->danger()
                ->persistent()
                ->send();

            throw ValidationException::withMessages([
                'email' => 'Your account is inactive.',
            ]);
        }

        
        Filament::auth()->login($user, $state['remember']);

        UserActivityLogger::log('login', 'User logged in');

        return app(LoginResponse::class);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label('Email address')
                    ->required()
                    ->email(),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required(),

                Checkbox::make('remember')
                    ->label('Remember me'),

               Placeholder::make('forgot-password-link')
                    ->content(new \Illuminate\Support\HtmlString(<<<HTML
                        <div class="mt-4 text-center text-sm">
                            <a href="{$this->getForgotPasswordUrl()}" class="text-primary-600 hover:underline">
                                Forgot your password?
                            </a>
                        </div>
                    HTML))
                    ->disableLabel(),

            ]);
    }

    protected function getForgotPasswordUrl(): string
    {
        return route('password.request');
    }
}
