<?php

namespace App\Filament\Resources\ManageUsers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;;

use Illuminate\Support\Facades\Hash;

class ManageUserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('email')
                    ->email()
                    ->placeholder('Masukkan Email')
                    ->required(),

                TextInput::make('password')
                    ->password()
                    ->placeholder('Masukkan Password')
                    ->required()
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->visibleOn('create'),

                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'petugas' => 'Petugas',
                        'pimpinan' => 'Pimpinan',
                    ])
                    ->placeholder('Pilih Role User')
                    ->required(),
            ]);
    }
}
