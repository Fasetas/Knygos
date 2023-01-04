<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $validationRules = [
        'name' => ['required', 'min:3', 'max:64'],
        'surname' => ['required', 'min:3', 'max:64'],
    ];
    private $validationMessages = [
        'name.required' => '<b>Vardas</b> yra privalomas',
        'surname.required' => '<b>Pavardė</b> yra privaloma',
        'name.min' => 'Vardas turi buti ne trumpesnis nei 3 simboliai',
        'surname.min' => 'Pavardė turi buti ne trumpesnė nei 3 simboliai',
        'name.max' => 'Vardas turi buti ne ilgesnis nei 64 simboliu',
        'surname.max' => 'Pavardė turi buti ne ilgesnė nei 64 simboliu',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view("authors.index", [
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("authors.create");
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
        $author = new Author();
        $author->name = $request->name;
        $author->surname = $request->surname;
        $author->save();

        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view("authors.edit", [
            "author" => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    { {
            $request->validate($this->validationRules, $this->validationMessages);
            $author->name = $request->name;
            $author->surname = $request->surname;
            $author->save();
            return redirect()->route('authors.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }
}
