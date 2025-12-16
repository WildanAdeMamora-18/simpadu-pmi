<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\PmiArrival;
use Illuminate\Support\Facades\DB;

class PmiMasukPerBulan extends ChartWidget
{
    protected static ?int $sort = 2;

    protected ?string $heading = 'Data Pmi Masuk Per Bulan';

    protected function getData(): array
    {
        $data = PmiArrival::select(
                DB::raw("MONTH(tanggal_kedatangan) as bulan"),
                DB::raw("COUNT(*) as total")
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $labels = $data->map(function ($item) {
            return date('F', mktime(0, 0, 0, $item->bulan, 1));
        });

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah PMI',
                    'data' => $data->pluck('total'),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
