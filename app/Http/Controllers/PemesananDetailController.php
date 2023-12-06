<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\PemesananDetail;

class PemesananDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = PemesananDetail::all();
        return view('pemesanan_detail.index', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detail = PemesananDetail::all();
        return view('pemesanan_detail.create', compact('detail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',

        ]);
        Pemesanan::create($request->all());
        return redirect()->route('pemesanan_detail.index')
            ->with('success', 'Pemesanan Detail berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = PemesananDetail::findOrFail($id);
        return view('pemesanan_detail.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detail = PemesananDetail::findOrFail($id);
        return view('pemesanan_detail.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'produk_id' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',

        ]);
        $detail = PemesananDetail::findOrFail($id);
        $detail->update($request->all());
        return redirect()->route('pemesanan_detail.index')
            ->with('success', 'Pemesanan Detail berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = PemesananDetail::findOrFail($id);
        $detail->delete();
        return redirect()->route('pemesanan_detail.index')
            ->with('success', 'Pemesanan Detail berhasil dihapus');
    }
}
