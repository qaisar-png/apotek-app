<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\StafApotek;
use App\Models\Obat;
use Illuminate\Http\Request;

class WebController extends Controller
{
    // Pelanggan
    public function pelanggan()
    {
        return view('pelanggan', ['data' => Pelanggan::latest()->get()]);
    }

    public function simpanPelanggan(Request $request)
    {
        Pelanggan::create($request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]));
        return redirect('/pelanggan')->with('success', 'Data pelanggan tersimpan');
    }

    // Staf apotek kalau nggak salah
    public function staf()
    {
        return view('staf', ['data' => StafApotek::latest()->get()]);
    }

    public function simpanStaf(Request $request)
    {
        StafApotek::create($request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
        ]));
        return redirect('/staf-apotek')->with('success', 'Data staf tersimpan');
    }

    // ini untuk obat
    public function obat()
    {
        return view('obat', ['data' => Obat::latest()->get()]);
    }

    public function simpanObat(Request $request)
    {
        Obat::create($request->validate([
            'kode_obat' => 'required|string|unique:obats,kode_obat',
            'nama_obat' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]));
        return redirect('/obat')->with('success', 'Data obat tersimpan');
    }
}