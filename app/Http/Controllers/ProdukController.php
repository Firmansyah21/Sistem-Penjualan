<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $categories = Kategori::all();

        return view('produk.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'ket' => 'required',
        ]);

        $gambarPath = $request->file('gambar')->store('public/gambar');
        $gambarUrl = asset('storage/' . $gambarPath);

        Produk::create([
            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambarUrl,
            'ket' => $request->ket,
        ]);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'stok' => 'required|integer',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif',
            'ket' => 'required',
        ]);

        $produk = Produk::find($id);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/gambar');
            $gambarUrl = asset('storage/' . $gambarPath);
            $produk->gambar = $gambarUrl;
        }

        $produk->kategori_id = $request->kategori_id;
        $produk->name = $request->name;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->ket = $request->ket;

        $produk->save();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    // ...


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::find($id);
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::find($id);
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::find($id)->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
