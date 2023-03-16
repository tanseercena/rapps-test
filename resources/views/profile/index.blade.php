@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 p-5">
                <h1><i class="bi bi-person" aria-hidden="true"></i> Welcome, {{ auth()->user()->name }}</h1>
                <hr/>
            </div>
        </div>

    </div>

@endsection
