@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 p-5">
                <h1><i class="bi bi-people" aria-hidden="true"></i> {{ $author['first_name'] ." ". $author['last_name'] }}</h1>
                @if(count($author['books']) == 0)
                    <a href="{{ route('authors.delete', ['id' => $author['id']]) }}" class="btn btn-danger btn-sm">Delete Author</a>
                @endif
                <hr/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 p-5">
                <h1><i class="bi bi-book" aria-hidden="true"></i> Books</h1>
                <hr/>
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Release Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Format</th>
                        <th scope="col">No of Pages</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($author['books'] as $book)
                        <tr>
                            <th scope="row">{{ $book['id'] }}</th>
                            <td>{{ $book['title'] }}</td>
                            <td>{{ $book['release_date'] }}</td>
                            <td>{{ $book['description'] }}</td>
                            <td>{{ $book['isbn'] }}</td>
                            <td>{{ $book['format'] }}</td>
                            <td>{{ $book['number_of_pages'] }}</td>
                            <td>
                                <a href="{{ route('book.delete', ['id' => $book['id']]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
