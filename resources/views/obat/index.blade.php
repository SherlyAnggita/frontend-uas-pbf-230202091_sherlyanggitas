@php $user = session('user'); @endphp
@extends('layouts.main')


@section('title', 'Daftar Obat')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="fw-bold">Daftar Obat</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card shadow border-0 rounded-4">
                {{-- ===== Header Card ===== --}}
                <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom">
                    <h5 class="m-0">Data Obat Rumah Sakit</h5>
                    
                    {{-- 🔍 Search --}}
                    <div class="input-group" style="width: 300px;">
                        <input type="text" id="searchInput" class="form-control form-control-sm"
                               placeholder="Cari obat..." style="border-radius: 5px;">
                        <button class="btn btn-light btn-sm" type="button" id="searchButton">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                {{-- ===== Body Card ===== --}}
                <div class="card-body">
                    {{-- ➕ Tambah (modal) --}}
                    <button type="button" class="btn btn-outline-primary shadow mb-3"
                            data-bs-toggle="modal" data-bs-target="#tambahObat">
                        <i class="fas fa-plus"></i> Tambah Obat
                    </button>

                    {{-- ⬇️ Export --}}
                    <a href="{{ url('/obat/export-pdf') }}"
                       class="btn btn-outline-warning mb-3 float-end shadow">
                        <i class="fas fa-download me-1"></i>PDF
                    </a>


                    {{-- ✅ Alerts --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2 shadow-sm" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-2 shadow-sm" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- ===== Tabel ===== --}}
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center bg-white rounded-3 overflow-hidden"
                               id="obatTable">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($obat as $obt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $obt['nama_obat'] ?? '-' }}</td>
                                    <td>{{ $obt['kategori'] ?? '-' }}</td>
                                    <td>{{ $obt['stok'] ?? '-' }}</td>
                                    <td>Rp {{ number_format($obt['harga'],0,',','.') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="/obat/{{ $obt['id'] }}/edit"
                                               class="btn btn-outline-success btn-sm shadow">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="/obat/{{ $obt['id'] }}" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-outline-danger btn-sm shadow">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center fw-semibold text-muted py-4">
                                        Tidak ada data.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div> {{-- /card‑body --}}
            </div> {{-- /card --}}
        </div>
    </div>
</div>

{{-- ===== Modal Tambah Obat ===== --}}
<div class="modal fade" id="tambahObat" tabindex="-1" aria-labelledby="tambahObatLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahObatLabel">Form Tambah Obat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- panggil partial form --}}
        @include('obat.create')
      </div>
    </div>
  </div>
</div>

{{-- ===== Script Search + Auto‑dismiss Alert ===== --}}
@push('scripts')
<script>
    // live search
    const input = document.getElementById('searchInput');
    input.addEventListener('input', filterTable);
    document.getElementById('searchButton').addEventListener('click', filterTable);

    function filterTable(){
        const s = input.value.toLowerCase();
        document.querySelectorAll('#obatTable tbody tr').forEach(row=>{
            const nama = row.children[1].textContent.toLowerCase();
            row.style.display = nama.includes(s) ? '' : 'none';
        });
    }

    // auto‑dismiss
    setTimeout(()=>{
        document.querySelectorAll('.alert').forEach(a=>{
            new bootstrap.Alert(a).close();
        });
    }, 2000);
</script>
@endpush
@endsection
