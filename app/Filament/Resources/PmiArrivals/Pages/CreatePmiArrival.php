<?php

namespace App\Filament\Resources\PmiArrivals\Pages;

use App\Filament\Resources\PmiArrivals\PmiArrivalResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePmiArrival extends CreateRecord
{
    protected static string $resource = PmiArrivalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        return $data;
    }
}
