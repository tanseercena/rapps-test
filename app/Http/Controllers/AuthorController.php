<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SkeletonApi;

class AuthorController extends Controller
{
    public function index() {
        $authors = SkeletonApi::getAuthors();

        return view('author.index', ['authors' => $authors['items']]);
    }

    public function single($id) {
        $author = SkeletonApi::getSingleAuthor($id);

        return view('author.single', ['author' => $author]);
    }

    public function deleteAuthor($id) {
        SkeletonApi::deleteAuthor($id);

        return redirect()->route('authors');
    }

    public function deleteBook($id) {
        SkeletonApi::deleteBook($id);

        return redirect()->back();
    }

}
