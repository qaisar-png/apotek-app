<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        return response()->json(Obat::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_obat' => 'required|string|unique:obats,kode_obat',
            'nama_obat' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        return response()->json(Obat::create($data), 201);
    }

    public function show(Obat $obat)
    {
        return response()->json($obat);
    }

    public function update(Request $request, Obat $obat)
    {
        $data = $request->validate([
            'kode_obat' => 'sometimes|required|string|unique:obats,kode_obat,' . $obat->id,
            'nama_obat' => 'sometimes|required|string|max:255',
            'stok' => 'sometimes|required|integer|min:0',
            'tanggal_kadaluarsa' => 'sometimes|required|date',
        ]);

        $obat->update($data);
        return response()->json($obat);
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}