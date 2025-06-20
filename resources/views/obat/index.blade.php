<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Obat</title>
</head>
<body>
    <h1>Daftar Obat</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $obt)
            <tr>
                <td>{{ $dsn['nama_obat'] ?? '-' }}</td>
                <td>{{ $dsn['kategori'] ?? '-' }}</td>
                <td>{{ $dsn['stok'] ?? '-' }}</td>
                <td>{{ $dsn['harga'] ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
