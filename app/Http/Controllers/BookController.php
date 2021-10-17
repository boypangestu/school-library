<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Author;
use App\Models\BookDetail;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $books = Book::all();
        return view('menu.book.bookhome', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $authors = Author::all();

        return view('menu.book.new', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $book = Book::create([
            'judul_buku' => $data['judul_buku'],
            'des_buku' => $data['des_buku']
        ]);

        foreach ($data['authors'] as $author) {
            BookDetail::create([
                'book_id' => $book->id,
                'author_id' => $author
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        $authors = Author::all();
        return view('menu.book.edit', compact('authors', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        $data = $request->all();

        $book->judul_buku = $request->judul_buku;
        $book->des_buku = $request->des_buku;
        $book->save();

        BookDetail::where('book_id', $book->id)->delete();

        foreach ($data['authors'] as $author) {
            BookDetail::create([
                'book_id' => $book->id,
                'author_id' => $author
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        BookDetail::where('book_id', $book->id)->delete();
        $book->delete();


        return redirect()->route('books.index');
    }
}
