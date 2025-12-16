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


class PmiArrivalResource extends Resource
{

    protected static ?string $navigationLabel = 'Kedatangan PMI';

    protected static ?string $model = PmiArrival::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;

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
}
