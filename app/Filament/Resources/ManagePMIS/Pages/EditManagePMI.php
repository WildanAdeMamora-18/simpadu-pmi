<?php

namespace App\Filament\Resources\ManagePMIS\Pages;

use App\Filament\Resources\ManagePMIS\ManagePMIResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditManagePMI extends EditRecord
{
    protected static string $resource = ManagePMIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
