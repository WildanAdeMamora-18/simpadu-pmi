<?php

namespace App\Filament\Resources\ManagePMIS\Pages;

use App\Filament\Resources\ManagePMIS\ManagePMIResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewManagePMI extends ViewRecord
{
    protected static string $resource = ManagePMIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
