@extends('layout.home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card text-left">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" id="judul_buku"
                            aria-describedby="bookHelp" placeholder="Judul Buku">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="des_buku">Deskripsi</label>
                        <textarea class="form-control" name="book_description" id="des_buku" rows="3"></textarea>
                    </div>
                    <div class="mt-2 form-group mb-2">
                        <label for="bookAuthors">Book Authors</label>
                        <select id="bookAuthors" name="authors" class="form-control" multiple="multiple">
                            @foreach ($authors as $item)
                                <option value="{{ $item->id }}">{{ $item->nm_author }}</option>
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
                    type: 'POST',
                    url: '{{ route('books.store') }}',
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
