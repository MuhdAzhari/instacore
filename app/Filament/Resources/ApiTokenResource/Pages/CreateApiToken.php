<?php

namespace App\Filament\Resources\ApiTokenResource\Pages;

use App\Models\User;
use App\Models\AccessToken;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Filament\Resources\ApiTokenResource;

class CreateApiToken extends CreateRecord
{
    protected static string $resource = ApiTokenResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $user = User::findOrFail($data['tokenable_id']);
        $token = $user->createToken($data['name']);

        $accessToken = AccessToken::findOrFail($token->accessToken->id);

        // ✅ Convert expires_in to proper Carbon datetime
        if ($data['expires_at'] !== 'never') {
            $accessToken->expires_at = now()->addDays((int) $data['expires_at']);
        }

        $accessToken->is_active = $data['is_active'] ?? true;
        $accessToken->save();

        session()->flash('api_token_plaintext', $token->plainTextToken);

        return $accessToken;
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
