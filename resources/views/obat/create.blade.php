<form method="POST" action="/obat">
    @csrf
    <input type="hidden" name="id" value="1"> {{-- backend membutuhkan --}}

    <div class="mb-3">
        <label>Nama Obat</label>
        <input type="text" class="form-control" name="nama_obat" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" class="form-control" name="kategori" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" class="form-control" name="harga" required>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan</button>
</form>
