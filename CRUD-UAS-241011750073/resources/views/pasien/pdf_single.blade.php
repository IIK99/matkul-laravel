<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Rekam Medis - {{ $pasien->nama_pasien }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #0077b6;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        .header h2 {
            color: #0077b6;
            margin: 0;
            padding: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0 0;
            color: #666;
        }
        .content {
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f8f9fa;
            width: 30%;
            text-align: left;
        }
        .photo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .photo-container img {
            max-width: 200px;
            border: 2px solid #ddd;
            border-radius: 8px;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Klinik Sehat Bersama</h2>
        <p>Laporan Rekam Medis Pasien</p>
    </div>

    @if($base64Image)
    <div class="photo-container">
        <img src="{{ $base64Image }}" alt="Foto Pasien">
    </div>
    @endif

    <div class="content">
        <table>
            <tr>
                <th>Nama Pasien</th>
                <td>{{ $pasien->nama_pasien }}</td>
            </tr>
            <tr>
                <th>Dokter Pemeriksa</th>
                <td>{{ $pasien->dokter }}</td>
            </tr>
            <tr>
                <th>Tanggal Kunjungan</th>
                <td>{{ \Carbon\Carbon::parse($pasien->tanggal_kunjungan)->format('d F Y') }}</td>
            </tr>
            <tr>
                <th>Diagnosa</th>
                <td>{{ $pasien->diagnosa }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d/m/Y H:i') }} | Klinik Sehat Bersama</p>
    </div>
</body>
</html>
