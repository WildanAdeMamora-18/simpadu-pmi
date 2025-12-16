<?php

namespace App\Filament\Resources\PmiArrivals\Pages;

use App\Filament\Resources\PmiArrivals\PmiArrivalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPmiArrivals extends ListRecords
{
    protected static string $resource = PmiArrivalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
