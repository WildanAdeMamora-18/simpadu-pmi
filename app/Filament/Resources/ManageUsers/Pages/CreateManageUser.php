<?php

namespace App\Filament\Resources\ManageUsers\Pages;

use App\Filament\Resources\ManageUsers\ManageUserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateManageUser extends CreateRecord
{
    protected static string $resource = ManageUserResource::class;
}
