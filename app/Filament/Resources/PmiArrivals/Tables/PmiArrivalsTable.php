<?php

namespace App\Filament\Resources\PmiArrivals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use App\Models\PmiArrival;
use Illuminate\Support\Facades\Auth;

class PmiArrivalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pmi')
                    ->searchable(),

                TextColumn::make('no_paspor')
                    ->label('No Paspor')
                    ->searchable(),

                TextColumn::make('tanggal_kedatangan')
                    ->label('Tanggal Kedatangan')
                    ->date()
                    ->sortable(),

                TextColumn::make('flight_number')
                    ->label('Flight'),

                TextColumn::make('negara_penempatan'),

                BadgeColumn::make('jenis_kepulangan')
                    ->colors([
                        'success' => 'finish',
                        'warning' => 'cuti',
                        'danger' => 'bermasalah',
                    ]),

                TextColumn::make('ket_kepulangan')
                    ->limit(30),

                TextColumn::make('created_at')
                    ->since()
                    ->label('Input'),
            ])
            ->filters([
                // Filter tanggal
                Filter::make('tanggal_kedatangan')
                    ->form([
                        DatePicker::make('from'),
                        DatePicker::make('until'),
                    ])
                    ->query(
                        fn($query, $data) =>
                        $query
                            ->when($data['from'], fn($q) => $q->whereDate('tanggal_kedatangan', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->whereDate('tanggal_kedatangan', '<=', $data['until']))
                    ),

                // Filter jenis kepulangan
                SelectFilter::make('jenis_kepulangan')
                    ->options([
                        'finish' => 'Finish Contract',
                        'cuti' => 'Cuti',
                        'bermasalah' => 'Bermasalah',
                        'lainnya' => 'Lainnya',
                    ]),

                // Filter negara
                SelectFilter::make('negara_penempatan')
                    ->options(
                        fn() => PmiArrival::pluck('negara_penempatan', 'negara_penempatan')->toArray()
                    ),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn() => auth::user()?->role === 'admin'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn() => auth::user()?->role === 'admin'),
                ]),
            ]);
    }
}
