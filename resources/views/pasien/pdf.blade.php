<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background: #eee;
        }
    </style>
</head>
<body>
    <h3>Daftar Pasien Rumah Sakit</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasien as $index => $psn)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $psn['nama'] ?? '-' }}</td>
                    <td>{{ $psn['alamat'] ?? '-' }}</td>
                    <td>{{ $psn['tanggal_lahir'] ?? '-' }}</td>
                    <td>{{ $psn['jenis_kelamin'] ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
