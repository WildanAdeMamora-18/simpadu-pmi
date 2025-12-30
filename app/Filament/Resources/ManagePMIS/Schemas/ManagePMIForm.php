<?php

namespace App\Filament\Resources\ManagePMIS\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\SelectInput;

class ManagePMIForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nik')
                    ->label('NIK')
                    ->placeholder('Masukkan NIK')
                    ->required()
                    ->unique(),

                TextInput::make('no_paspor')
                    ->label('No Paspor')
                    ->placeholder('Masukkan No Paspor')
                    ->required()
                    ->unique(),

                TextInput::make('nama_pmi')
                    ->label('Nama PMI')
                    ->placeholder('Masukkan Nama PMI')
                    ->required(),

                DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->placeholder('Masukkan Tanggal Lahir')
                    ->required(),

                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->placeholder('Pilih Jenis Kelamin PMI')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan',
                    ])
                    ->required(),

                Select::make('pendidikan')
                    ->label('Pendidikan')
                    ->placeholder('Pilih Pendidikan Terakhir')
                    ->options([
                        'sd' => 'SD',
                        'smp' => 'SMP',
                        'sma' => 'SMA',
                    ])
                    ->required(),

                TextInput::make('alamat')
                    ->label('Alamat')
                    ->placeholder('Masukkan Alamat')
                    ->required(),

                TextInput::make('kecamatan')
                    ->label('Kecamatan')
                    ->placeholder('Kecamatan')
                    ->required(),

                TextInput::make('kabupaten_kota')
                    ->label('Kabupaten / Kota')
                    ->placeholder('Kabupaten / Kota')
                    ->required(),

                TextInput::make('rt')
                    ->label('RT')
                    ->placeholder('RT')
                    ->numeric()
                    ->required(),

                TextInput::make('rw')
                    ->label('RW')
                    ->placeholder('RW')
                    ->numeric()
                    ->required(),   
            ]);
    }
}
