<?php

namespace App\Filament\Resources\PmiArrivals\Pages;

use App\Filament\Resources\PmiArrivals\PmiArrivalResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPmiArrival extends EditRecord
{
    protected static string $resource = PmiArrivalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $this->dispatch('refreshStats');
    }
}
