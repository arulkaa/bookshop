<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = DB::table('authors')->pluck("name", "id");
        $genres = DB::table('genres')->pluck("name", "id");
        return view('books.create', compact('authors', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $slug = str_replace(' ', '-', $request->title);
        $cover = $request->file('cover')->store('covers');

        $book = new Book();

        $book->title = request('title');
        $book->description = request('description');
        $book->cover = $cover;

        if($request->genre) {
            $book->genres()->attach($request->genre);
        }
        if($request->author) {
            $book->authors()->attach($request->author);
        }


        $book->save();

        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
       return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
