<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $validationRules = [
        'title' => ['required', 'min:3', 'max:64'],
        'pages' => ['required', 'min:3', 'max:64'],
        'isbn' => ['required', 'min:3', 'max:64'],
        'short_description' => ['max:512'],
    ];
    private $validationMessages = [
        'title.required' => '<b>Pavadinimas</b> yra privalomas',
        'title.min' => 'Pavadinimas turi buti ne trumpeesnis nei 3 simboliai',
        'title.max' => 'Pavadinimas turi buti ne ilgesnis nei 64 simboliu',
        'short_description.max' => 'Negali buti daugiau nei 512 simboliu',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::all();
        $authors = Author::all();
        return view("books.index", [
            'books' => $books,
            'authors' => $authors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $users = User::all();
        return view('books.create', [
            'authors' => $authors,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules, $this->validationMessages);
        $book = new Book();
        $book->title = $request->title;
        $book->pages = $request->pages;
        $book->isbn = $request->isbn;
        $book->short_description = $request->short_description;
        $book->author_id = $request->author_id;
        $book->user_id = $request->user_id;
        $book->save();

        return redirect()->route('books.index');
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
        $request->validate($this->validationRules, $this->validationMessages);
        $book->title = $request->title;
        $book->pages = $request->pages;
        $book->isbn = $request->isbn;
        $book->short_description = $request->short_description;
        $book->author_id = $request->author_id;
        $book->user_id = $request->user_id;
        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
