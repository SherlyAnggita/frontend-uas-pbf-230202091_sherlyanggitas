<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;



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
}
