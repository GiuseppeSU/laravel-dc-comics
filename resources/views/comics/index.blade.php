@extends('layouts.app')

@section('page-title', 'Fumetti')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-3">
                    <div class="card my-3">
                        <h1 class="fs-5 text-center">{{ $comic->title }}</h1>
                        <img src={{ $comic->thumb }} class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{ $comic->description }}</p>
                            <p>{{ $comic->price }}$</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>






@endsection
