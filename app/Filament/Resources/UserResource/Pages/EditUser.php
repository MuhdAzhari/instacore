<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Log;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function ($record) {
                    // Protect main admin account from being deleted
                    if ($record->email === 'admin@instacore.com') {
                        Notification::make()
                            ->title('Action Blocked')
                            ->body('You cannot delete the main admin account.')
                            ->color(Color::Red)
                            ->icon('heroicon-o-x-circle')
                            ->danger()
                            ->send();

                        return false;
                    }

                    // Log deletion intent
                    Log::info('User scheduled for deletion', [
                        'target_user_id' => $record->id,
                        'target_email' => $record->email,
                        'initiated_by' => auth()->user()->email,
                        'time' => now(),
                    ]);
                })
                ->requiresConfirmation()
                ->modalHeading('⚠️ Confirm Deletion')
                ->modalSubheading('Are you sure you want to delete this user? This action **cannot** be undone.')
                ->modalDescription('Deleting this user will remove all access and data related to the account. Please confirm this irreversible action.')
                ->modalIcon('heroicon-o-trash')
                ->modalIconColor('danger')
                ->modalButton('Yes, delete user permanently')
                ->color('danger')
                ->modalWidth('lg')
                ->successNotificationTitle('User deleted successfully.'),
        ];
    }
}
