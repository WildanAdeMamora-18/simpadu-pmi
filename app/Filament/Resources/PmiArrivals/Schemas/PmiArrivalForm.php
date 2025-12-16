<?php

namespace App\Filament\Resources\PmiArrivals\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Get;
use Filament\Forms\Components\Section;
use Filament\Schemas\Components\Section as ComponentsSection;

class PmiArrivalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // Data Kedatangan PMI
                ComponentsSection::make('Data Kedatangan PMI')
                    ->schema([
                        DatePicker::make('tanggal_kedatangan')
                            ->label('Tanggal Kedatangan')
                            ->required(),

                        TextInput::make('flight_number')
                            ->label('Nomor Penerbangan')
                            ->placeholder('Nomor Penerbangan PMI')
                            ->required(),

                        TextInput::make('jam_kedatangan')
                            ->label('Jam Kedatangan')
                            ->placeholder('Jam Kedatangan PMI')
                            ->required(),

                        TextInput::make('no_paspor')
                            ->label('No Paspor')
                            ->placeholder('No Paspor PMI')
                            ->required(),

                        TextInput::make('kantor_imigrasi')
                            ->label('Kantor Imigrasi')
                            ->placeholder('Kantor Imigrasi PMI')
                            ->required(),
                    ])
                    ->columns(2),

                // Data Pribadi PMI
                ComponentsSection::make('Data Diri PMI')
                    ->schema([
                        TextInput::make('nama_pmi')
                            ->label('Nama PMI')
                            ->placeholder('Nama Lengkap PMI')
                            ->required(),

                        DatePicker::make('tanggal_lahir')
                            ->label('Tgl/Bln/Thn Lahir')
                            ->placeholder('Tanggal Lahir PMI')
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
                            ->placeholder('Pendidikan PMI')
                            ->options([
                                'SD' => 'SD',
                                'SMP' => 'SMP',
                                'SMA' => 'SMA',
                            ])
                            ->required(),

                        TextInput::make('alamat_jalan')
                            ->label('Desa / Jalan')
                            ->placeholder('Alamat Asal PMI')
                            ->columnSpanFull()
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
                    ])
                    ->columns(2),

                // Data Penempatan dan Kepulangan PMI
                ComponentsSection::make('Data Penempatan dan Kepulangan PMI')
                    ->schema([
                        TextInput::make('pengirim')
                            ->placeholder('Nama Pengirim/P3MI')
                            ->label('Pengirim/P3MI'),

                        TextInput::make('agency')
                            ->placeholder('Nama Agency')
                            ->label('Agency'),

                        TextInput::make('negara_penempatan')
                            ->label('Negara Penempatan')
                            ->placeholder('Negara Penempatan PMI')
                            ->required(),

                        TextInput::make('pekerjaan')
                            ->label('Jenis Jabatan/Pekerjaan')
                            ->placeholder('Jabatan/Pekerjaan PMI')
                            ->required(),

                        Select::make('jenis_kepulangan')
                            ->label('Jenis Kepulangan')
                            ->placeholder('Jenis Kepulangan PMI')
                            ->options([
                                'finish' => 'Finish Contract',
                                'cuti' => 'Cuti',
                                'bermasalah' => 'Bermasalah',
                                'lainnya' => 'Lainnya',
                            ])
                            ->required(),

                        Textarea::make('ket_kepulangan')
                            ->label('Keterangan Jenis Kepulangan')
                            ->placeholder('Keterangan Jenis Kepulangan PMI')
                            ->required(),
                    ])
                    ->columns(2),

                ComponentsSection::make('Form Kepulangan PMI dari Bandara Juanda ke Daerah Asal')
                    ->schema([
                        Select::make('dijemput')
                            ->label('Dijemput Oleh')
                            ->placeholder('Pilih Dijemput Oleh')
                            ->options([
                                'keluarga' => 'Keluarga',
                                'P3MI' => 'P3MI',
                                'Lainnya' => 'Lainnya',
                            ])
                            ->live(),

                        Select::make('pulang_sendiri')
                            ->label('Pulang Sendiri')
                            ->placeholder('Pilih Pulang Sendiri')
                            ->options([
                                'taksi' => 'Taksi',
                                'kendaraan umum' => 'Kendaraan Umum',
                                'carteran' => 'Carteran',
                                'pesawat' => 'Pesawat',
                            ])
                            ->live(),

                        Select::make('transit')
                            ->label('Transit')
                            ->placeholder('Pilih Transit')
                            ->options([
                                'kantor upt-p2tk' => 'Kantor UPT-P2TK',
                                'lainnya' => 'Lainnya',
                            ])
                            ->live(),
                    ]),
            ])
            ->columns(1);
    }
}
