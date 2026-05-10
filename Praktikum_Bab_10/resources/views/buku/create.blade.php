@extends('buku.layout')
@section('title', 'Tambah Buku')

@section('content')
<h2>Tambah Buku Baru</h2>
<form action="{{ route('buku.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Judul Buku:</label>
        <input type="text" name="judul" required placeholder="Masukkan judul buku...">
    </div>
    <div class="form-group">
        <label>Penulis:</label>
        <input type="text" name="penulis" required placeholder="Masukkan nama penulis...">
    </div>
    <button type="submit" class="btn btn-primary">Simpan Data</button>
    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection