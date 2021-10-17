@extends('layout.home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card text-left">
                <div class="card-body">
                    <form method="POST" action="{{ route('authors.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Author</label>
                            <input type="text" class="form-control" name="nm_author" id="nama" aria-describedby="nama"
                                required>
                        </div>
                        <button id="simpan" type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
