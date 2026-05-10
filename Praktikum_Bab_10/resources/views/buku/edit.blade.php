@extends('buku.layout')
@section('title', 'Edit Buku')

@section('content')
<h2>Edit Data Buku</h2>
<form action="{{ route('buku.update', $buku->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Judul Buku:</label>
        <input type="text" name="judul" value="{{ $buku->judul }}" required>
    </div>
    <div class="form-group">
        <label>Penulis:</label>
        <input type="text" name="penulis" value="{{ $buku->penulis }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Data</button>
    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection