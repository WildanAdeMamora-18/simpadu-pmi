<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\PmiArrival;
use Illuminate\Support\Facades\DB;

class PmiMasukPerMinggu extends ChartWidget
{
    protected static ?int $sort = 3;

    protected ?string $heading = 'Data Pmi Masuk Per Minggu';

    protected function getData(): array
    {
        // Ambil data per minggu (8 minggu terakhir)
        $data = PmiArrival::select(
            DB::raw('YEAR(tanggal_kedatangan) as year'),
            DB::raw('WEEK(tanggal_kedatangan, 1) as week'),
            DB::raw('COUNT(*) as total')
        )
            ->where('tanggal_kedatangan', '>=', now()->subWeeks(8))
            ->groupBy('year', 'week')
            ->orderBy('year')
            ->orderBy('week')
            ->get();

        $labels = [];
        $values = [];

        foreach ($data as $item) {
            $labels[] = 'Minggu ' . $item->week;
            $values[] = $item->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah PMI',
                    'data' => $values,
                    'borderWidth' => 2,
                    'fill' => false,
                ],
            ],
            'labels' => $labels,
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
