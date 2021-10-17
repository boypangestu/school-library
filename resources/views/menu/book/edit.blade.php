@extends('layout.home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card text-left">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" name="judul_buku" value="{{ $book->judul_buku }}" class="form-control"
                            id="judul_buku" aria-describedby="bookHelp" placeholder="Judul Buku">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="des_buku">Deskripsi</label>
                        <textarea class="form-control" name="des_buku" id="des_buku" rows="3"
                            $books=Book::all();>{{ $book->des_buku }}</textarea>
                    </div>
                    <div class="mt-2 form-group mb-2">
                        <label for="bookAuthors">Book Authors</label>
                        <select id="bookAuthors" name="authors" class="form-control" multiple="multiple">
                            @foreach ($authors as $author)
                                @php
                                    $print = false;
                                @endphp
                                @foreach ($book->authors as $bookAuthor)
                                    @if ($author->id == $bookAuthor->id)
                                        <option value="{{ $author->id }}"
                                            {{ $author->id == $bookAuthor->id ? 'selected' : '' }}>
                                            {{ $author->nm_author }}</option>
                                        @php $print = true; @endphp
                                    @break
                                @endif
                            @endforeach
                            @if (!$print)
                                <option value="{{ $author->id }}">
                                    {{ $author->nm_author }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <button id="simpan" type="submit" class="btn btn-primary">Simpan</button>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#bookAuthors').select2({
                tags: true
            })

            $('#simpan').on('click', function() {
                let selectedAuthor = $('#bookAuthors').find(':selected')
                let authors = []
                $.each(selectedAuthor, function(index, value) {
                    authors.push(value.value)
                })

                // console.log(authors)

                $.ajax({
                    type: 'PUT',
                    url: '{{ route('books.update', $book->id) }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        judul_buku: $('#judul_buku').val(),
                        des_buku: $('#des_buku').val(),
                        authors: authors
                    },
                    success: function(data) {
                        window.location.href = '{{ route('books.index') }}'
                    }
                })
            })
        })
    </script>
@endsection
