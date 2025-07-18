<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\UserActivity;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentUserActivity extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                UserActivity::query()
                    ->where('user_id', auth()->id())
                    ->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('event')
                    ->label('Event')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->wrap()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),
            ]);
    }
}
