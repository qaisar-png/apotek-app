@extends('layouts.app')
@section('content')
<h3>Staf Apotek</h3>
<form method="POST" action="/staf-apotek" class="card card-body mb-4">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>

<table class="table table-bordered bg-white">
    <thead><tr><th>Id</th><th>Nama</th><th>Alamat</th><th>Tempat, Tgl Lahir</th><th>No HP</th></tr></thead>
    <tbody>
    @foreach($data as $d)
        <tr>
            <td>{{ $d->id }}</td><td>{{ $d->nama }}</td><td>{{ $d->alamat }}</td>
            <td>{{ $d->tempat_lahir }}, {{ $d->tanggal_lahir }}</td><td>{{ $d->no_hp }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection