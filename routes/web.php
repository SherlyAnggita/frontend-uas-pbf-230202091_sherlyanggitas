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
Route::put('/pasien/{id}', [Pasien::class, 'update']);
Route::delete('/pasien/{id}', [Pasien::class, 'destroy']);
Route::post('/pasien', [Pasien::class, 'store']);
Route::post('/pasien', [Pasien::class, 'store']);



//ROUTES OBAT
Route::get('/obat', [Obat::class, 'index']);