@extends('layouts.main')

@section('title', 'Edit Obat')

@section('header')
<h1 class="fw-bold mb-3">Edit Obat</h1>
@endsection

@section('content')
<div class="card shadow border-0 rounded-4">
    <div class="card-body">
        <form method="POST" action="/obat/{{ $obat['id'] }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" name="nama_obat" value="{{ $obat['nama_obat'] ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" name="kategori" value="{{ $obat['kategori'] ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" value="{{ $obat['stok'] ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" value="{{ $obat['harga'] ?? '' }}" required>
            </div>

            <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i> Simpan</button>
            <a href="/obat" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
        </form>
    </div>
</div>
@endsection
