@php $user = session('user'); @endphp
@extends('layouts.main')

@section('title', 'Daftar Pasien')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="fw-bold">Daftar Pasien</h1>
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
                    <h5 class="m-0">Data Pasien Rumah Sakit</h5>
                    
                    {{-- 🔍 Search --}}
                    <div class="input-group" style="width: 300px;">
                        <input type="text" id="searchInput" class="form-control form-control-sm"
                               placeholder="Cari pasien..." style="border-radius: 5px;">
                        <button class="btn btn-light btn-sm" type="button" id="searchButton">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                {{-- ===== Body Card ===== --}}
                <div class="card-body">
                    {{-- ➕ Tambah (modal) --}}
                    <a href="/pasien/create" class="btn btn-outline-primary shadow mb-3">
                        <i class="fas fa-plus"></i> Tambah Pasien
                    </a>

                    {{-- ⬇️ Export --}}
                    <a href="{{ url('/pasien/export-pdf') }}"
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
                               id="pasienTable">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasien as $psn)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $psn['nama'] ?? '-' }}</td>
                                    <td>{{ $psn['alamat'] ?? '-' }}</td>
                                    <td>{{ $psn['tanggal_lahir'] ?? '-' }}</td>
                                    <td>{{ $psn['jenis_kelamin'] ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="/pasien/{{ $psn['id'] }}/edit"
                                               class="btn btn-outline-success btn-sm shadow">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="/pasien/{{ $psn['id'] }}" method="POST"
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
                                        Tidak ada data pasien.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div> {{-- /card-body --}}
            </div> {{-- /card --}}
        </div>
    </div>
</div>

{{-- ===== Script Search + Auto-dismiss Alert ===== --}}
@push('scripts')
<script>
    // live search
    const input = document.getElementById('searchInput');
    input.addEventListener('input', filterTable);
    document.getElementById('searchButton').addEventListener('click', filterTable);

    function filterTable(){
        const s = input.value.toLowerCase();
        document.querySelectorAll('#pasienTable tbody tr').forEach(row=>{
            const nama = row.children[1].textContent.toLowerCase();
            row.style.display = nama.includes(s) ? '' : 'none';
        });
    }

    // auto-dismiss alerts
    setTimeout(()=>{
        document.querySelectorAll('.alert').forEach(a=>{
            new bootstrap.Alert(a).close();
        });
    }, 2000);
</script>
@endpush
@endsection
