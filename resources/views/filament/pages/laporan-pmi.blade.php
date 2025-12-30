<x-filament-panels::page>

    {{-- Tabel Data PMI --}}
    {{ $this->table }}

    <x-filament::section heading="Total PMI">
        <p class="text-3xl font-bold">{{ $totalPmi }}</p>
    </x-filament::section>

    <x-filament::section heading="PMI Bermasalah">
        <p class="text-3xl font-bold text-danger-600">
            {{ $pmiBermasalah }}
        </p>
    </x-filament::section>

    {{-- PMI per Bulan --}}
    <x-filament::section heading="Jumlah PMI per Bulan">
        <table class="w-full text-sm border rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Bulan</th>
                    <th class="px-4 py-2 text-left">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pmiPerBulan as $row)
                    <tr class="border-t">
                        <td class="px-4 py-2">
                            {{ \Carbon\Carbon::create()->month($row->bulan)->translatedFormat('F') }}
                        </td>
                        <td class="px-4 py-2">{{ $row->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-filament::section>

    {{-- PMI per Negara --}}
    <x-filament::section heading="Jumlah PMI per Negara">
        <table class="w-full text-sm border rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Negara</th>
                    <th class="px-4 py-2 text-left">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pmiPerNegara as $row)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $row->negara_penempatan }}</td>
                        <td class="px-4 py-2">{{ $row->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-filament::section>

    {{-- PMI per Jenis Kepulangan --}}
    <x-filament::section heading="PMI Berdasarkan Jenis Kepulangan">
        <table class="w-full text-sm border rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Jenis</th>
                    <th class="px-4 py-2 text-left">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pmiPerJenisKepulangan as $row)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ ucfirst($row->jenis_kepulangan) }}</td>
                        <td class="px-4 py-2">{{ $row->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-filament::section>

    {{-- Pengaduan per Kategori --}}
    <x-filament::section heading="Pengaduan PMI per Kategori">
        <table class="w-full text-sm border rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Kategori</th>
                    <th class="px-4 py-2 text-left">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaduanPerKategori as $row)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ ucfirst($row->jenis_pengaduan) }}</td>
                        <td class="px-4 py-2">{{ $row->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-filament::section>

</x-filament-panels::page>
