<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Pasien</title>
</head>
<body>
    <h1>Daftar Pasien</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $psn)
            <tr>
                <td>{{ $dsn['nama_pasien'] ?? '-' }}</td>
                <td>{{ $dsn['alamat'] ?? '-' }}</td>
                <td>{{ $dsn['tanggal_lahir'] ?? '-' }}</td>
                <td>{{ $dsn['jenis_kelamin'] ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
