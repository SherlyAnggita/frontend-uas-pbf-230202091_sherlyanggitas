<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;




class Obat extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/obat');
        $obat = $response->json()['data_obat'];
        return view('obat.index', compact('obat'));

        dd($obat);

        return view('obat.index', compact('obat'));
    }

    
    public function create()
{
    return view('obat.create');
}

public function store(Request $request)
{
    $response = Http::post('http://localhost:8080/obat', [
        'nama_obat'      => $request->nama_obat,
        'kategori'          => $request->kategori,
        'stok'     => $request->stok,
        'harga'    => $request->harga,

    ]);


    return redirect('/obat')->with('success', 'Data berhasil ditambahkan!');
}



public function edit($id)
{
    $response = Http::get("http://localhost:8080/obat/$id");
    $data = $response->json();
    $obat = $data['obat_byid']; 

    return view('obat.edit', compact('obat'));
}


public function update(Request $request, $id)
{
    Http::put("http://localhost:8080/obat/$id", [
        'nama_obat' => $request->nama_obat,
        'kategori' => $request->kategori,
        'stok'  => $request->stok,
        'harga'=> $request->harga,
    ]);

    return redirect('/obat')->with('success', 'Data berhasil diupdate!');
}

public function destroy($id)
{
    Http::delete("http://localhost:8080/obat/$id");
    return redirect('/obat')->with('success', 'Data berhasil dihapus!');
}

public function exportPDF() {
     $response = Http::get('http://localhost:8080/obat');
    $obat = $response->json()['data_obat'];

    // Load view pdf dengan data obat
    $pdf = Pdf::loadView('obat.pdf', compact('obat'));
    return $pdf->download('obat.pdf');
}



}
