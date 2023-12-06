
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Keranjang</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjang as $item)
                    <tr>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->subtotal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
