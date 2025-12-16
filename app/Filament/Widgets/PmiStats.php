<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\PmiArrival;
use App\Models\PmiPengaduan;

class PmiStats extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected ?string $pollingInterval = '5s';

    protected function getListeners(): array
    {
        return [
            'refreshStats' => '$refresh',
        ];
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Data PMI', PmiArrival::count())
                ->icon('heroicon-o-users'),
            Stat::make('Data Masuk PMI Hari Ini', PmiArrival::whereDate('created_at', today())->count())
                ->icon('heroicon-o-clipboard-document-list'),
            Stat::make(
                'Jumlah Pengaduan Masuk',
                PmiPengaduan::count()
            )
                ->icon('heroicon-o-chat-bubble-left-right'),
            Stat::make(
                'Jumlah PMI Finish',
                PmiArrival::where('jenis_kepulangan', 'finish')->count()
            )
                ->icon('heroicon-o-check-circle'),
            Stat::make(
                'Jumlah PMI Cuti',
                PmiArrival::where('jenis_kepulangan', 'cuti')->count()
            )
                ->icon('heroicon-o-clock'),
            Stat::make(
                'Jumlah PMI Bermasalah',
                PmiArrival::where('jenis_kepulangan', 'bermasalah')->count()
            )
                ->icon('heroicon-o-exclamation-triangle'),
        ];
    }
}
