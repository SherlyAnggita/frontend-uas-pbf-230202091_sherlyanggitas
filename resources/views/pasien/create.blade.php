@extends('layouts.main')

@section('title', 'Tambah Pasien')

@section('content')
    <div class="container mt-4">
        <form method="POST" action="/pasien">
    @csrf
    {{-- <input type="hidden" name="id" value="1"> --}}

    <div class="mb-3">
        <label>Nama Pasien</label>
        <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" class="form-control" name="alamat" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" required>
    </div>
    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select" required>
    <option value="" selected disabled>Pilih jenis kelamin</option>
    <option value="L">Laki-laki</option>
    <option value="P">Perempuan</option>
</select>

    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan</button>
</form>
    </div>
@endsection



