<?php

namespace App\Filament\Resources;

use App\Models\Audit;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\Action;
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
                    ->sortable()
                    ->searchable(),

                TextColumn::make('auditable_id')
                    ->label('Model ID')
                    ->sortable(),

                BadgeColumn::make('event')
                    ->label('Event')
                    ->colors([
                        'created' => 'success',
                        'updated' => 'warning',
                        'deleted' => 'danger',
                        'login' => 'info',
                        'logout' => 'gray',
                        'failed' => 'danger',
                    ])
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('event')
                    ->label('Event Type')
                    ->options([
                        'created' => 'Created',
                        'updated' => 'Updated',
                        'deleted' => 'Deleted',
                        'login' => 'Login',
                        'logout' => 'Logout',
                        'failed' => 'Failed',
                    ]),

                SelectFilter::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name'),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('from')->label('From'),
                        DatePicker::make('until')->label('Until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn ($q, $date) => $q->whereDate('created_at', '>=', $date))
                            ->when($data['until'], fn ($q, $date) => $q->whereDate('created_at', '<=', $date));
                    }),
            ])
            ->headerActions([
                Action::make('export_excel')
                    ->label('Export to Excel')
                    ->url(fn () => route('audit.export.excel'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-m-arrow-down-tray'),

                Action::make('export_pdf')
                    ->label('Export to PDF')
                    ->url(fn () => route('audit.export.pdf'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-m-document-text'),
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
