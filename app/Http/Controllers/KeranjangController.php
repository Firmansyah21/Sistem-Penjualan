<?php

namespace App\Http\Controllers;

use App\Models\Karanjang;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keranjang = Karanjang::all();
        return view('keranjang.index', compact('keranjang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keranjang = Karanjang::all();
        return view('keranjang.create', compact('keranjang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'produk_id' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'harga' => 'required',
            'pemesanan_id' => 'required',
            'tgl_pesan' => 'required',
        ]);

        Karanjang::create([
            'user_id' => $request->user_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'harga' => $request->harga,
            'pemesanan_id' => $request->pemesanan_id,
            'tgl_pesan' => $request->tgl_pesan,
        ]);

        return redirect()->route('keranjang.index')
            ->with('success', 'Keranjang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $keranjang = Karanjang::findOrFail($id);
        return view('keranjang.show', compact('keranjang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $keranjang = Karanjang::findOrFail($id);
        return view('keranjang.edit', compact('keranjang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'produk_id' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'harga' => 'required',
            'pemesanan_id' => 'required',
            'tgl_pesan' => 'required',
        ]);

        $keranjang = Karanjang::findOrFail($id);
        $keranjang->update($request->all());

        return redirect()->route('keranjang.index')
            ->with('success', 'Keranjang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karanjang::find($id)->delete();

        return redirect()->route('keranjang.index')
            ->with('success', 'Keranjang berhasil dihapus');
    }
}
