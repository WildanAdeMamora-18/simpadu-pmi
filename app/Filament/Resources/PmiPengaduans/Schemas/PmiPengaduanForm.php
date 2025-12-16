<?php

namespace App\Filament\Resources\PmiPengaduans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Forms\Components\Section;

class PmiPengaduanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Form Pengaduan PMI')
                    ->schema([
                        TextInput::make('nama_pmi')
                            ->placeholder('Nama Lengkap PMI')
                            ->required(),
                        TextInput::make('paspor')
                            ->placeholder('Nomor Paspor PMI')
                            ->required(),
                        TextInput::make('negara_asal')
                            ->placeholder('Negara Asal PMI')
                            ->required(),
                        DatePicker::make('tanggal_kedatangan')
                            ->required(),
                        Select::make('jenis_pengaduan')
                            ->placeholder('Pilih Jenis Pengaduan')
                            ->options([
                                'gaji' => 'Gaji Tidak Dibayar',
                                'dokumen' => 'Dokumen Ditahan',
                                'kekerasan' => 'Kekerasan',
                                'lainnya' => 'Lainnya',
                            ])
                            ->required(),
                        Textarea::make('deskripsi')
                            ->placeholder('Deskripsi Pengaduan')
                            ->required()
                            ->columnSpanFull(),
                        Select::make('status')
                            ->options(['masuk' => 'Masuk', 'diproses' => 'Diproses', 'selesai' => 'Selesai'])
                            ->default('masuk')
                            ->required(),
                    ])
                    ->columns(1),
            ]);
    }
}
