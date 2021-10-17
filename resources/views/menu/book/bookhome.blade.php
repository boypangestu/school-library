@extends('layout.home')

@section('content')

    <div class="container">
        @hasrole('Admin')
            <a href="{{ route('books.create') }}">Tambah Book</a>
        @endhasrole

        <div class="row">
            <div class="card text-center ">

                <div class="card-body">
                    <table class="display" id="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $book->judul_buku }}</td>
                                    <td>
                                        @hasrole('Admin')
                                            <a href="{{ route('books.edit', $book->id) }}"
                                                class="btn btn-outline-primary">Edit</a>

                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                                style="display: inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        @endhasrole
                                    </td>
                                </tr>
                            @empty
                                <p>No Record Found!</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"
        integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA=="
        crossorigin="anonymous" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        })
    </script>
@endsection
