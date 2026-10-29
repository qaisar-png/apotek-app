<?php

namespace App\Http\Controllers;

use App\Models\StafApotek;
use Illuminate\Http\Request;

class StafApotekController extends Controller
{
    public function index()
    {
        return response()->json(StafApotek::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
        ]);

        return response()->json(StafApotek::create($data), 201);
    }

    public function show(StafApotek $stafApotek)
    {
        return response()->json($stafApotek);
    }

    public function update(Request $request, StafApotek $stafApotek)
    {
        $data = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string',
            'tanggal_lahir' => 'sometimes|required|date',
            'tempat_lahir' => 'sometimes|required|string|max:255',
            'no_hp' => 'sometimes|required|string|max:20',
        ]);

        $stafApotek->update($data);
        return response()->json($stafApotek);
    }

    public function destroy(StafApotek $stafApotek)
    {
        $stafApotek->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}