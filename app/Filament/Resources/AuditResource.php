<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use OwenIt\Auditing\Models\Audit;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Filament\Resources\AuditResource\Pages;

class AuditResource extends Resource
{
    protected static ?string $model = Audit::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'System Logs';
    protected static ?int $navigationSort = 99;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('auditable_type')
                    ->label('Model')
                    ->sortable(),

                TextColumn::make('auditable_id')
                    ->label('Model ID')
                    ->sortable(),

                BadgeColumn::make('event')
                    ->colors([
                        'created' => 'success',
                        'updated' => 'warning',
                        'deleted' => 'danger',
                    ])
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Date')
                    ->since()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAudits::route('/'),
        ];
    }
}
