<?php

namespace App\Exports;

use App\Models\PmiArrival;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PmiBulananExport implements FromCollection, WithHeadings
{
    protected string $bulan;

    public function __construct(string $bulan)
    {
        $this->bulan = $bulan;
    }

    public function collection()
    {
        return PmiArrival::whereRaw(
            "DATE_FORMAT(tanggal_kedatangan, '%Y-%m') = ?",
            [$this->bulan]
        )->select(
            'nama_pmi',
            'negara_penempatan',
            'jenis_kepulangan',
            'tanggal_kedatangan'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nama PMI',
            'Negara',
            'Jenis Kepulangan',
            'Tanggal Kedatangan',
        ];
    }
}

