<?php

namespace App\Filament\Resources;

use App\Models\User;
use App\Models\AccessToken;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\ApiTokenResource\Pages;

class ApiTokenResource extends Resource
{
    protected static ?string $model = AccessToken::class;
    protected static ?string $navigationIcon = 'heroicon-o-key';
    protected static ?string $navigationGroup = 'System Management';
    protected static ?string $navigationLabel = 'API Tokens';

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function canViewAny(): bool
    {
        return true;
    }

    public static function canCreate(): bool
    {
        return true;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('tokenable_id')
               ->label('User')
                ->options(fn () => \App\Models\User::pluck('name', 'id'))
                ->searchable()
                ->required(),

            TextInput::make('name')
                ->label('Token Name')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Token Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tokenable.name')
                    ->label('User')
                    ->sortable(), // no .searchable() here — relationship columns may cause SQL errors

                TextColumn::make('last_used_at')
                    ->label('Last Used')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApiTokens::route('/'),
            'create' => Pages\CreateApiToken::route('/create'),
        ];
    }
}
