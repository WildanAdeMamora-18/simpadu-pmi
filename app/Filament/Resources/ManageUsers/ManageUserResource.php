<?php

namespace App\Filament\Resources\ManageUsers;

use App\Filament\Resources\ManageUsers\Pages\CreateManageUser;
use App\Filament\Resources\ManageUsers\Pages\EditManageUser;
use App\Filament\Resources\ManageUsers\Pages\ListManageUsers;
use App\Filament\Resources\ManageUsers\Schemas\ManageUserForm;
use App\Filament\Resources\ManageUsers\Tables\ManageUsersTable;
use App\Models\ManageUser;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use UnitEnum;

class ManageUserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'Kelola User';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static string|UnitEnum|null $navigationGroup = 'Kelola Data';
    protected static ?int $navigationSort = 0;

    protected static ?string $recordTitleAttribute = 'yes';

    public static function form(Schema $schema): Schema
    {
        return ManageUserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ManageUsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListManageUsers::route('/'),
            'create' => CreateManageUser::route('/create'),
            'edit' => EditManageUser::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->role === 'admin';
    }
}
