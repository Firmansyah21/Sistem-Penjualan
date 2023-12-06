<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemesanan = Pemesanan::all();
        return view('pemesanan.create', compact('pemesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'tgl_pemesanan' => 'required',
            'total' => 'required',
            'alamat_kirim' => 'required',
            'status_pesan' => 'required',
            'tgl_bayar' => 'required',
            'ongkir_id' => 'required',

        ]);

        Pemesanan::create($request->all());
        return redirect()->route('pemesanan.index')
            ->with('success', 'Pemesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.show', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.edit', compact('pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'tgl_pemesanan' => 'required',
            'total' => 'required',
            'alamat_kirim' => 'required',
            'status_pesan' => 'required',
            'tgl_bayar' => 'required',
            'ongkir_id' => 'required',

        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($request->all());
        return redirect()->route('pemesanan.index')
            ->with('success', 'Pemesanan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return redirect()->route('pemesanan.index')
            ->with('success', 'Pemesanan berhasil dihapus');
    }
}
