<?php

namespace App\Filament\Resources\PmiPengaduans\Pages;

use App\Filament\Resources\PmiPengaduans\PmiPengaduanResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePmiPengaduan extends CreateRecord
{
    protected static string $resource = PmiPengaduanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        return $data;
    }
}
