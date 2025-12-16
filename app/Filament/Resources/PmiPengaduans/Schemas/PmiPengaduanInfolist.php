<?php

namespace App\Filament\Resources\PmiPengaduans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PmiPengaduanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_pmi'),
                TextEntry::make('paspor')
                    ->placeholder('-'),
                TextEntry::make('negara_asal'),
                TextEntry::make('tanggal_kedatangan')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('jenis_pengaduan'),
                TextEntry::make('deskripsi')
                    ->columnSpanFull(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
