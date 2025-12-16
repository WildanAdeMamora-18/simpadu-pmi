<?php

namespace App\Filament\Resources\PmiArrivals\Pages;

use App\Filament\Resources\PmiArrivals\PmiArrivalResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPmiArrival extends ViewRecord
{
    protected static string $resource = PmiArrivalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
