<?php

namespace App\Filament\Resources\ManagePMIS\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Auth;

class ManagePMISTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nik')->searchable(),
                TextColumn::make('no_paspor')->searchable(),
                TextColumn::make('nama_pmi')->searchable(),
                TextColumn::make('tanggal_lahir')->date()->searchable(),
                TextColumn::make('jenis_kelamin')->searchable(),
                TextColumn::make('pendidikan')->searchable(),
                TextColumn::make('kabupaten_kota')->searchable(),
            ])
            ->filters([
                SelectFilter::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ]),
                SelectFilter::make('pendidikan')
                    ->options([
                        'SD' => 'SD',
                        'SMP' => 'SMP',
                        'SMA' => 'SMA',
                    ]),
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
