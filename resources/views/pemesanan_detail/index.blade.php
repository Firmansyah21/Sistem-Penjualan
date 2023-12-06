<!-- resources/views/pemesanan_detail/index.blade.php -->

@extends('layouts.admin-app')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('pemesanan_detail.create')}}" class="btn btn-primary ">Tambah</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produk ID</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->produk_id }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>
                                    <a href="{{ route('pemesanan_detail.show', $item->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('pemesanan_detail.edit', $item->id) }}" class="btn btn-default">Edit</a>
                                    <form action="{{ route('pemesanan_detail.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
