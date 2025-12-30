<?php

namespace App\Filament\Resources\PmiArrivals;

use App\Filament\Resources\PmiArrivals\Pages\CreatePmiArrival;
use App\Filament\Resources\PmiArrivals\Pages\EditPmiArrival;
use App\Filament\Resources\PmiArrivals\Pages\ListPmiArrivals;
use App\Filament\Resources\PmiArrivals\Pages\ViewPmiArrival;
use App\Filament\Resources\PmiArrivals\Schemas\PmiArrivalForm;
use App\Filament\Resources\PmiArrivals\Schemas\PmiArrivalInfolist;
use App\Filament\Resources\PmiArrivals\Tables\PmiArrivalsTable;
use App\Models\PmiArrival;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class PmiArrivalResource extends Resource
{

    protected static ?string $navigationLabel = 'Kelola Kedatangan PMI';

    protected static ?string $model = PmiArrival::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowRightEndOnRectangle;

    protected static string|UnitEnum|null $navigationGroup = 'Kelola Data';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return PmiArrivalForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PmiArrivalInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PmiArrivalsTable::configure($table);
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
            'index' => ListPmiArrivals::route('/'),
            'create' => CreatePmiArrival::route('/create'),
            'view' => ViewPmiArrival::route('/{record}'),
            'edit' => EditPmiArrival::route('/{record}/edit'),
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
