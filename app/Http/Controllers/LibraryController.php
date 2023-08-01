<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LibraryController extends Controller
{

    public function index(){
        $books = Books::with('author')
            ->latest()
            ->paginate(8);

        $authors = Authors::get()
            ->sortBy('full_name')
            ->pluck('full_name', 'id');

        return Inertia::render('Library/List', [
            'books' => $books,
            'authors' => $authors
        ]);
    }

    public function insert(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required',
            'author_id' => 'required'
        ]);

        $book = new Books;
        $book->title = $request->title;
        $book->synopsis = $request->synopsis;
        $book->author_id = $request->author_id;
        $book->save();

        return to_route('library');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required',
            'author_id' => 'required'
        ]);

        $book = Books::find($request->id);
        $book->title = $request->title;
        $book->synopsis = $request->synopsis;
        $book->author_id = $request->author_id;
        $book->save();

        return to_route('library', [ 'page' => $request->page ]);
    }

    public function destroy(Request $request)
    {
        $book = Books::find($request->id);
        $book->delete();

        return to_route('library', [ 'page' => $request->page ]);
    }

}
