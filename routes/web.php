<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Obat;
use App\Http\Controllers\Pasien;


Route::get('/', function () {return view('welcome');
});

//ROUTES PASIEN

Route::get('/pasien', [Pasien::class, 'index']);
Route::get('/pasien/create', [Pasien::class, 'create']);
Route::post('/pasien', [Pasien::class, 'store']);
Route::get('/pasien/{id}/edit', [Pasien::class, 'edit']);
Route::put('/pasien/{id}', [Pasien::class, 'update']); // <- ini yang penting
Route::delete('/pasien/{id}', [Pasien::class, 'destroy']);

// export pdf pasien
Route::get('/pasien/export-pdf', [Pasien::class, 'exportPDF']);


//ROUTES OBAT
Route::get('/obat', [Obat::class, 'index']);
Route::get('/obat/create', [Obat::class, 'create']);
Route::post('/obat', [Obat::class, 'store']);
Route::get('/obat/{id}/edit', [Obat::class, 'edit']);
Route::put('/obat/{id}', [Obat::class, 'update']);
Route::delete('/obat/{id}', [Obat::class, 'destroy']);

//export pdf obat
Route::get('/obat/export-pdf', [Obat::class, 'exportPDF']);
