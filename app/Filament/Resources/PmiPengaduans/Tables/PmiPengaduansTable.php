<?php

namespace App\Filament\Resources\PmiPengaduans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\TextInput;

class PmiPengaduansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pmi')
                    ->label('Nama PMI')
                    ->searchable(),

                TextColumn::make('jenis_pengaduan')
                    ->badge(),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'primary' => 'baru',
                        'warning' => 'diproses',
                        'success' => 'selesai',
                    ]),

                TextColumn::make('created_at')
                    ->label('Tanggal Pengaduan')
                    ->date(),

            ])
            ->filters([
                // Filter berdasarkan NAMA PMI (text input)
                Filter::make('nama_pmi')
                    ->form([
                        TextInput::make('nama_pmi')
                            ->label('Nama PMI')
                            ->placeholder('Cari nama PMI'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['nama_pmi'],
                                fn($q, $value) =>
                                $q->where('nama_pmi', 'like', '%' . $value . '%')
                            );
                    }),

                // Filter STATUS pengaduan
                SelectFilter::make('status')
                    ->label('Status Pengaduan')
                    ->options([
                        'masuk' => 'Masuk',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                    ]),

                // Filter JENIS pengaduan
                SelectFilter::make('jenis_pengaduan')
                    ->label('Jenis Pengaduan')
                    ->options([
                        'gaji' => 'Gaji',
                        'kontrak' => 'Kontrak',
                        'kekerasan' => 'Kekerasan',
                        'dokumen' => 'Dokumen',
                        'lainnya' => 'Lainnya',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
