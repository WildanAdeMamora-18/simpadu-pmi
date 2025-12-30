<?php

namespace App\Filament\Resources\ManagePMIS\Pages;

use App\Filament\Resources\ManagePMIS\ManagePMIResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListManagePMIS extends ListRecords
{
    protected static string $resource = ManagePMIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
