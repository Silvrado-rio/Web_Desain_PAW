@extends('buku.layout')
@section('title', 'Daftar Buku')

@section('content')
<div class="header-flex">
    <h2>Daftar Buku</h2>
    <div>
        @auth
            <span style="margin-right: 15px;">Halo, <b>{{ Auth::user()->name }}</b>!</span>
    
            <a href="{{ route('profile.edit') }}" class="btn btn-secondary" style="margin-right: 5px; padding: 6px 12px; text-decoration: none; color: #424242; font-size: 13px;">Pengaturan Profil</a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger" style="padding: 6px 12px;">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
        @endauth
    </div>
</div>

@auth
    <div style="margin-bottom: 15px;">
        <a href="{{ route('buku.create') }}" class="btn btn-primary">+ Tambah Buku Baru</a>
    </div>
@endauth

<table>
    <tr>
        <th>ID</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        @auth <th>Aksi</th> @endauth
    </tr>
    @foreach($bukus as $buku)
    <tr>
        <td>{{ $buku->id }}</td>
        <td>{{ $buku->judul }}</td>
        <td>{{ $buku->penulis }}</td>
        @auth
        <td>
            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning" style="padding: 6px 12px;">Edit</a>
            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" style="padding: 6px 12px;" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
            </form>
        </td>
        @endauth
    </tr>
    @endforeach
</table>
@endsection