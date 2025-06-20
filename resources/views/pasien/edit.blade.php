@extends('layouts.main')

@section('title', 'Edit Pasien')

@section('header')
<h1 class="fw-bold mb-3">Edit Pasien</h1>
@endsection

@section('content')
<div class="card shadow border-0 rounded-4">
    <div class="card-body">
        <form method="POST" action="/pasien/{{ $pasien['id'] }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Pasien</label>
        <input type="text" class="form-control" name="nama" value="{{ $pasien['nama'] }}" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" class="form-control" name="alamat" value="{{ $pasien['alamat'] }}" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" value="{{ $pasien['tanggal_lahir'] }}" required>
    </div>
    <div class="mb-3">
        <label>Jenis Kelamin</label>
       <select name="jenis_kelamin" class="form-select" required>
    <option value="" disabled {{ $pasien['jenis_kelamin'] == null ? 'selected' : '' }}>Pilih jenis kelamin</option>
    <option value="L" {{ $pasien['jenis_kelamin'] == 'L' ? 'selected' : '' }}>Laki-laki</option>
    <option value="P" {{ $pasien['jenis_kelamin'] == 'P' ? 'selected' : '' }}>Perempuan</option>
</select>

    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save me-1"></i> Simpan Perubahan
    </button>
</form>

    </div>
</div>
@endsection
