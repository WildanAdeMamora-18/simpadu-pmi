<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan PMI</title>
    <style>
        body { font-family: sans-serif; font-size: 11px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 5px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2 align="center">Laporan Kedatangan PMI</h2>

<p>
    Total PMI: <strong>{{ $totalPmi }}</strong><br>
    PMI Bermasalah: <strong>{{ $pmiBermasalah }}</strong>
</p>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama PMI</th>
            <th>Negara</th>
            <th>Jenis Kepulangan</th>
            <th>Tanggal Kedatangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pmi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_pmi }}</td>
                <td>{{ $item->negara_penempatan }}</td>
                <td>{{ $item->jenis_kepulangan }}</td>
                <td>{{ $item->tanggal_kedatangan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
