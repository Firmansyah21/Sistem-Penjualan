
@extends('layouts.admin-app')

@section('container')
    <div class="container">

                    <div class="card-header">Create Category</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('kategori.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

    </div>
@endsection
