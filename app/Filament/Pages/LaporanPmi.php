<?php

namespace App\Filament\Pages;

use App\Models\PmiArrival;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use UnitEnum;
use Illuminate\Support\Facades\DB;
use App\Models\PmiPengaduan;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PmiBulananExport;
use Filament\Actions\Action;

class LaporanPmi extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationLabel = 'Laporan PMI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;
    protected static string|UnitEnum|null $navigationGroup = 'Laporan';
    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.laporan-pmi';

    public int $totalPmi;
    public int $pmiBermasalah;
    public $pmiPerBulan;
    public $pmiPerNegara;
    public $pmiPerJenisKepulangan;
    public $pengaduanPerKategori;

    public function mount(): void
    {
        // 1. PMI per bulan
        $this->pmiPerBulan = PmiArrival::select(
            DB::raw('MONTH(tanggal_kedatangan) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // 2. PMI per negara
        $this->pmiPerNegara = PmiArrival::select(
            'negara_penempatan',
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('negara_penempatan')
            ->get();

        // 3. PMI berdasarkan jenis kepulangan
        $this->pmiPerJenisKepulangan = PmiArrival::select(
            'jenis_kepulangan',
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('jenis_kepulangan')
            ->get();

        // 4. Pengaduan per kategori
        $this->pengaduanPerKategori = PmiPengaduan::select(
            'jenis_pengaduan',
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('jenis_pengaduan')
            ->get();

        // 5. Total PMI dan PMI bermasalah
        $this->totalPmi = PmiArrival::count();
        $this->pmiBermasalah = PmiArrival::where('jenis_kepulangan', 'bermasalah')->count();
    }

    protected function getTableQuery(): Builder
    {
        return PmiArrival::query()->latest();
    }

    protected function getHeaderActions(): array
    {
        $actions = [];

        // ADMIN: Export Excel
        if (in_array(auth::user()->role, ['admin', 'pimpinan'])) {
            $actions[] =
                Action::make('exportBulanan')
                ->label('Export Excel Bulanan')
                ->icon('heroicon-o-arrow-down-tray')
                ->form([
                    DatePicker::make('bulan')
                        ->label('Pilih Bulan')
                        ->required()
                        ->displayFormat('F Y')
                        ->format('Y-m')
                        ->native(false),
                ])
                ->action(function (array $data) {
                    return Excel::download(
                        new PmiBulananExport($data['bulan']),
                        'laporan-pmi-' . $data['bulan'] . '.xlsx'
                    );
                });
        }

        // ADMIN & PIMPINAN: Download PDF
        if (in_array(auth::user()->role, ['admin', 'pimpinan'])) {
            $actions[] =
                Action::make('downloadPdf')
                ->label('Download PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->url(route('laporan.pmi.pdf'))
                ->openUrlInNewTab();
        }

        return $actions;
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pmi')
                    ->label('Nama PMI')
                    ->searchable(),

                Tables\Columns\TextColumn::make('negara_penempatan')
                    ->label('Negara'),

                Tables\Columns\TextColumn::make('jenis_kepulangan')
                    ->label('Jenis Kepulangan')
                    ->color(fn(string $state): string => match ($state) {
                        'bermasalah' => 'danger',
                        'finish' => 'success',
                        'cuti' => 'warning',
                        default => 'secondary',
                    })
                    ->badge(),

                Tables\Columns\TextColumn::make('tanggal_kedatangan')
                    ->label('Tanggal Kedatangan')
                    ->date('d-m-Y'),
            ])
            ->paginated([10, 25, 50])
            ->defaultSort('tanggal_kedatangan', 'desc');
    }

    protected function getTableFilters(): array
    {
        // Filter hanya untuk ADMIN
        // if (Auth::user()->role !== 'admin') {
        //     return [];
        // }

        return [
            Filter::make('tanggal_kedatangan')
                ->label('Filter Tanggal Kedatangan')
                ->form([
                    DatePicker::make('dari')
                        ->label('Dari Tanggal'),
                    DatePicker::make('sampai')
                        ->label('Sampai Tanggal'),
                ])
                ->query(function (Builder $query, array $data) {
                    $query
                        ->when(
                            $data['dari'] ?? null,
                            fn(Builder $q, $date) =>
                            $q->whereDate('tanggal_kedatangan', '>=', $date)
                        )
                        ->when(
                            $data['sampai'] ?? null,
                            fn(Builder $q, $date) =>
                            $q->whereDate('tanggal_kedatangan', '<=', $date)
                        );
                }),
        ];
    }

    public static function canAccess(): bool
    {
        return auth::user()->role === 'pimpinan'
            || auth::user()->role === 'admin';
    }
}
