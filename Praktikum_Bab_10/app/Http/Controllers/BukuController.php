<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BukuController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    // READ (Publik)
    public function index() {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    // CREATE (Butuh Login)
    public function create() {
        return view('buku.create');
    }

    public function store(Request $request) {
        Buku::create($request->all());
        return redirect()->route('buku.index');
    }

    // UPDATE & DELETE (Butuh Login)
    public function edit(Request $request, $id) {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id) {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect()->route('buku.index');
    }

    public function destroy(Request $request, $id) {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index');
    }
}