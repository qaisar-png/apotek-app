@extends('layouts.app')
@section('content')
<h3>Daftar Obat</h3>
<form method="POST" action="/obat" class="card card-body mb-4">
    @csrf
    <div class="mb-3">
        <label class="form-label">Kode Obat</label>
        <input type="text" name="kode_obat" class="form-control" value="{{ old('kode_obat') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nama Obat</label>
        <input type="text" name="nama_obat" class="form-control" value="{{ old('nama_obat') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Stok Obat</label>
        <input type="number" name="stok" min="0" class="form-control" value="{{ old('stok') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Kadaluarsa / Expired</label>
        <input type="date" name="tanggal_kadaluarsa" class="form-control" value="{{ old('tanggal_kadaluarsa') }}" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>

<table class="table table-bordered bg-white">
    <thead><tr><th>Kode</th><th>Nama Obat</th><th>Stok</th><th>Expired</th></tr></thead>
    <tbody>
    @foreach($data as $d)
        <tr><td>{{ $d->kode_obat }}</td><td>{{ $d->nama_obat }}</td><td>{{ $d->stok }}</td><td>{{ $d->tanggal_kadaluarsa }}</td></tr>
    @endforeach
    </tbody>
</table>
@endsection