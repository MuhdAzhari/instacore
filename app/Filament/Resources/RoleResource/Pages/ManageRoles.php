<?php

namespace App\Filament\Resources\RoleResource\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\ManageRecords;

class ManageRoles extends ManageRecords
{
    protected static string $resource = RoleResource::class;

        protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(), // ✅ Show create button
        ];
    }
}
