<?php

namespace App\Filament\Resources\PmiPengaduans\Pages;

use App\Filament\Resources\PmiPengaduans\PmiPengaduanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPmiPengaduan extends ViewRecord
{
    protected static string $resource = PmiPengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
