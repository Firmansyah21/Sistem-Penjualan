<!-- resources/views/produk/index.blade.php -->

@extends('layouts.admin-app')

@section('container')
    <div class="container">
        <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
        <table class="table mt-3" id="produk-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->kategori_id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <img src="{{ $item->gambar ? $item->gambar : asset('path/to/default/image.jpg') }}" alt="{{ $item->name }}" style="max-width: 100px;">
                        </td>
                        <td>{{ $item->ket }}</td>
                        <td>
                            <a href="{{ route('produk.show', $item->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add the following scripts at the end of your file -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#produk-table').DataTable();
        });
    </script>
@endsection
