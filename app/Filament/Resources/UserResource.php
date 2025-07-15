<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
{
    return $form->schema([
        TextInput::make('name')
            ->required()
            ->maxLength(255),

        TextInput::make('email')
            ->email()
            ->required()
            ->maxLength(255),

        TextInput::make('password')
            ->password()
            ->maxLength(255)
            ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
            ->dehydrated(fn ($state) => filled($state))
            ->label('Password'),

        Select::make('roles')
            ->relationship('roles', 'name')
            ->multiple()
            ->label('Assigned Roles'),

         Toggle::make('is_active')
            ->label('Active')
            ->default(true),
    ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                BadgeColumn::make('roles.name')->label('Roles'),
                BadgeColumn::make('is_active')
                ->label('Status')
                ->colors([
                    'success' => true,
                    'danger' => false,
                ])
                ->formatStateUsing(fn (bool $state) => $state ? 'Active' : 'Inactive'),

            ])
            ->filters([
                TernaryFilter::make('is_active')
                ->label('Active Status')
                ->trueLabel('Active')
                ->falseLabel('Inactive'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
