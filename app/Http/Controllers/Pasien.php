<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Pasien extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/pasien');
        $pasien = $response->json()['data_pasien'];
        

        // dd($pasien);

        return view('pasien.index', compact('pasien'));
    }

    public function create()
{
    return view('pasien.create');
}

public function store(Request $request)
{

       $response = Http::post('http://localhost:8080/pasien', [
    'nama'            => $request->nama,
    'alamat'          => $request->alamat,
    'tanggal_lahir'   => $request->tanggal_lahir,
    'jenis_kelamin'   => $request->jenis_kelamin,
]);



    return redirect('/pasien')->with('success', 'Data berhasil ditambahkan!');
}




}

