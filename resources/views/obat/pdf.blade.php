<!DOCTYPE html>
<html>
<head>
    <title>Data Obat</title>
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
    <h3>Daftar Obat Rumah Sakit</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obat as $index => $obt)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $obt['nama_obat'] ?? '-' }}</td>
                    <td>{{ $obt['kategori'] ?? '-' }}</td>
                    <td>{{ $obt['stok'] ?? '-' }}</td>
                    <td>Rp {{ number_format($obt['harga'], 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
