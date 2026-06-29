<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            color: #0077b6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #00b4d8;
            color: white;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>KLINIK SEHAT BERSAMA</h2>
    <p>Laporan Data Rekam Medis Pasien</p>
    <hr>
</div>

<table>
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="15%">Foto</th>
            <th width="20%">Nama Pasien</th>
            <th width="20%">Dokter</th>
            <th width="15%">Tanggal</th>
            <th width="25%">Diagnosa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasiens as $index => $pasien)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td style="text-align: center;">
                @if($pasien->base64Image)
                    <img src="{{ $pasien->base64Image }}" alt="Foto" style="width: 60px; height: 60px; object-fit: cover;">
                @else
                    <span>-</span>
                @endif
            </td>
            <td>{{ $pasien->nama_pasien }}</td>
            <td>{{ $pasien->dokter }}</td>
            <td>{{ \Carbon\Carbon::parse($pasien->tanggal_kunjungan)->format('d/m/Y') }}</td>
            <td>{{ $pasien->diagnosa }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
