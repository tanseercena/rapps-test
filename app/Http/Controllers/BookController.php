<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SkeletonApi;

class BookController extends Controller
{
    public function addBook() {
        $authors = SkeletonApi::getAuthors();

        return view("book.add", ['authors' => $authors['items']]);
    }

    public function saveBook(Request $request) {
        $request->validate([
            'author' => 'required',
            'title' => 'required',
            'release_date' => 'required',
            'description' => 'required',
            'isbn' => 'required',
            'format' => 'required',
            'number_of_pages' => 'required',
        ]);

        $response = SkeletonApi::createBook($request);

        if(!$response) {
            return back()->withErrors('Error while creating Book!');
        }

        session()->flash('msg', 'Book Created!');

        return redirect()->back();
    }
}
