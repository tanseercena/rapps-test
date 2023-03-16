@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 p-5">
                <h1><i class="bi bi-people" aria-hidden="true"></i> Authors</h1>
                <hr/>
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Place of Birth</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <th scope="row">{{ $author['id'] }}</th>
                                <td>{{ $author['first_name'] }}</td>
                                <td>{{ $author['last_name'] }}</td>
                                <td>{{ $author['birthday'] }}</td>
                                <td>{{ ucfirst($author['gender']) }}</td>
                                <td>{{ $author['place_of_birth'] }}</td>
                                <td>
                                    <a href="{{ route("authors.single", ['id'=>$author['id']]) }}">View</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
