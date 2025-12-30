<?php

namespace App\Filament\Resources\ManagePMIS;

use App\Filament\Resources\ManagePMIS\Pages\ViewManagePMI;
use App\Filament\Resources\ManagePMIS\Pages\CreateManagePMI;
use App\Filament\Resources\ManagePMIS\Pages\EditManagePMI;
use App\Filament\Resources\ManagePMIS\Pages\ListManagePMIS;
use App\Filament\Resources\ManagePMIS\Schemas\ManagePMIForm;
use App\Filament\Resources\ManagePMIS\Tables\ManagePMISTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\Pmi;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class ManagePMIResource extends Resource
{
    protected static ?string $model = Pmi::class;

    protected static ?string $navigationLabel = 'Kelola Data PMI';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static string|UnitEnum|null $navigationGroup = 'Kelola Data';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'yes';

    public static function form(Schema $schema): Schema
    {
        return ManagePMIForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ManagePMISTable::configure($table);
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
            'index' => ListManagePMIS::route('/'),
            'create' => CreateManagePMI::route('/create'),
            'view' => ViewManagePMI::route('/{record}'),
            'edit' => EditManagePMI::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::check()
            && Auth::user()->role !== 'public';
    }


    public static function canCreate(): bool
    {
        return Auth::check()
            && in_array(Auth::user()->role, ['admin', 'petugas']);
    }


    public static function canEdit($record): bool
    {
        return Auth::check()
            && Auth::user()->role === 'admin';
    }


    public static function canDelete($record): bool
    {
        return Auth::check()
            && Auth::user()->role === 'admin';
    }
}
