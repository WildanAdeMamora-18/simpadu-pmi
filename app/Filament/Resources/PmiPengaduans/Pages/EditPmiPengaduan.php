<?php

namespace App\Filament\Resources\PmiPengaduans\Pages;

use App\Filament\Resources\PmiPengaduans\PmiPengaduanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPmiPengaduan extends EditRecord
{
    protected static string $resource = PmiPengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
