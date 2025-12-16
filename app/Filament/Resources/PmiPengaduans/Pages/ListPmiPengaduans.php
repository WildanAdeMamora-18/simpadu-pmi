<?php

namespace App\Filament\Resources\PmiPengaduans\Pages;

use App\Filament\Resources\PmiPengaduans\PmiPengaduanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPmiPengaduans extends ListRecords
{
    protected static string $resource = PmiPengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
