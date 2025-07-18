<?php

namespace App\Filament\Resources\ApiTokenResource\Pages;

use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\ApiTokenResource;
use App\Models\AccessToken;

class CreateApiToken extends CreateRecord
{
    protected static string $resource = ApiTokenResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $user = User::findOrFail($data['tokenable_id']);
        $token = $user->createToken($data['name']);

        session()->flash('api_token_plaintext', $token->plainTextToken);

        return AccessToken::findOrFail($token->accessToken->id);
    }

    protected function afterCreate(): void
    {
        \Filament\Notifications\Notification::make()
            ->title('Token created')
            ->body('Copy your token now: <code>' . session('api_token_plaintext') . '</code>')
            ->success()
            ->persistent()
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return ApiTokenResource::getUrl('index');
    }
}
