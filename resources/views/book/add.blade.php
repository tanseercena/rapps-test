@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 p-5">
                <h1><i class="bi bi-book" aria-hidden="true"></i> Add Book</h1>
                <hr/>
            </div>
        </div>

        <div class="row">

            <div class="col-12">

                @if($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif

                @if(session()->has('msg'))
                    <div>{{ session()->get('msg') }}</div>
                @endif

                <form method="post" action="{{ route('book.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Select Author</label>
                        <select class="form-select" name="author" required >
                            <option value="" >Select</option>
                            @foreach($authors as $author)
                                <option value="{{ $author['id'] }}">{{ $author['first_name'] }} {{ $author['last_name'] }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Book Title</label>
                        <input type="text" name="title" required class="form-control" id="title" >
                    </div>
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Release Date</label>
                        <input type="datetime-local" name="release_date" required  class="form-control" id="release_date" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Book Description</label>
                        <textarea class="form-control" name="description" required id="description" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" name="isbn" required class="form-control" id="isbn" >
                    </div>
                    <div class="mb-3">
                        <label for="format" class="form-label">Book Format</label>
                        <input type="text" name="format" required class="form-control" id="format" >
                    </div>
                    <div class="mb-3">
                        <label for="number_of_pages" class="form-label">No of Pages</label>
                        <input type="number" name="number_of_pages" required class="form-control" id="number_of_pages" >
                    </div>

                    <button type="submit" class="btn btn-primary">Add Book</button>
                </form>

            </div>

        </div>
    </div>

@endsection
