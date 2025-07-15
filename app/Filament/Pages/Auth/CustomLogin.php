<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Hash;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;

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
            // Show Filament toast notification
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

        return app(LoginResponse::class);
    }

}
