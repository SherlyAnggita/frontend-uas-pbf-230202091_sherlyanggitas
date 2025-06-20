<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class Pasien extends Controller
{

    public function index()
{
    $response = Http::get('http://localhost:8080/pasien');
    $pasienRaw = $response->json()['data_pasien'];

    $pasien = collect($pasienRaw)->map(function ($item) {
        return [
            'id' => $item['id'],
            'nama' => $item['nama'],
            'alamat' => $item['alamat'],
            'tanggal_lahir' => $item['tanggal_lahir'],
            'jenis_kelamin' => $item['jenis_kelamin'] ?? $item['jenisKelamin'] ?? '-',
        ];
    });

    return view('pasien.index', compact('pasien'));
}


    
    public function create()
{
    return view('pasien.create');
}


public function store(Request $request)
{

    $response = Http::post('http://localhost:8080/pasien', [
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
    ]);

   $response = Http::post('http://localhost:8080/pasien', [
    'nama' => $request->nama,
    'alamat' => $request->alamat,
    'tanggal_lahir' => $request->tanggal_lahir,
    'jenis_kelamin' => $request->jenis_kelamin,
]);

dd($response->json()); // cek respon dari backend


    if ($response->successful()) {
        return redirect('/pasien')->with('success', 'Pasien berhasil ditambahkan');
    } else {
        return back()->with('error', 'Gagal menambahkan pasien');
    }
}




public function edit($id)
{
    $response = Http::get("http://localhost:8080/pasien/$id");
    $data = $response->json();
    $pasien = $data['pasien_byid']; 

    return view('pasien.edit', compact('pasien')); // ✅ kirim ke view
}


public function update(Request $request, $id)
{
    Http::put("http://localhost:8080/pasien/$id", [
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tanggal_lahir'  => $request->tanggal_lahir,
        'jenis_kelamin'=> $request->jenis_kelamin,
    ]);

    return redirect('/pasien')->with('success', 'Data berhasil diupdate!');
}

public function destroy($id)
{
    Http::delete("http://localhost:8080/pasien/$id");
    return redirect('/pasien')->with('success', 'Data berhasil dihapus!');
}

public function exportPDF() {
     $response = Http::get('http://localhost:8080/pasien');
    $pasien = $response->json()['data_pasien'];


    $pdf = Pdf::loadView('pasien.pdf', compact('pasien'));
    return $pdf->download('pasien.pdf');
}
}
