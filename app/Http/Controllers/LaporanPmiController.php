<?php

namespace App\Http\Controllers;

use App\Models\PmiArrival;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class LaporanPmiController extends Controller
{
    public function exportPdf()
    {
        // Proteksi role
        if (!in_array(Auth::user()->role, ['admin', 'pimpinan'])) {
            abort(403);
        }

        $data = [
            'totalPmi' => PmiArrival::count(),
            'pmiBermasalah' => PmiArrival::where('jenis_kepulangan', 'bermasalah')->count(),
            'pmi' => PmiArrival::latest()->get(),
        ];

        $pdf = Pdf::loadView('pdf.laporan-pmi', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-pmi.pdf');
    }
}

