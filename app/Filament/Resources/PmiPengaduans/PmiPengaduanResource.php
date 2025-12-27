<?php

namespace App\Filament\Resources\PmiPengaduans;

use App\Filament\Resources\PmiPengaduans\Pages\CreatePmiPengaduan;
use App\Filament\Resources\PmiPengaduans\Pages\EditPmiPengaduan;
use App\Filament\Resources\PmiPengaduans\Pages\ListPmiPengaduans;
use App\Filament\Resources\PmiPengaduans\Pages\ViewPmiPengaduan;
use App\Filament\Resources\PmiPengaduans\Schemas\PmiPengaduanForm;
use App\Filament\Resources\PmiPengaduans\Schemas\PmiPengaduanInfolist;
use App\Filament\Resources\PmiPengaduans\Tables\PmiPengaduansTable;
use App\Models\PmiPengaduan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class PmiPengaduanResource extends Resource
{

    protected static ?string $navigationLabel = 'Pengaduan PMI';

    protected static ?string $model = PmiPengaduan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'yes';

    public static function form(Schema $schema): Schema
    {
        return PmiPengaduanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PmiPengaduanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PmiPengaduansTable::configure($table);
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
            'index' => ListPmiPengaduans::route('/'),
            'create' => CreatePmiPengaduan::route('/create'),
            'view' => ViewPmiPengaduan::route('/{record}'),
            'edit' => EditPmiPengaduan::route('/{record}/edit'),
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
