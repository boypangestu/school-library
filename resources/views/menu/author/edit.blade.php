@extends('layout.home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card text-left">

                <div class="card-body">
                    <form method="POST" action="{{ route('authors.update', $author->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Author</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="{{ $author->nm_author }}" aria-describedby="nama" required>
                        </div>

                        <button id="simpan" type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
