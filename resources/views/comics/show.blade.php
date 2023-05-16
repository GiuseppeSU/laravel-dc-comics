@extends('layouts.app')

@section('page-title')
    <h1>{{ $comics->title }}</h1>
@endsection

@section('content')
    <div class="card w-25 m-auto">
        <h1>{{ $comics->title }}</h1>
        <img class="img-fluid" src={{ $comics->thumb }} alt={{ $comics->title }}>
        <small>{{ $comics->description }}</small>

    </div>
    <div class="text-center mt-3">
        <a href="{{ route('comics.index') }}" class="btn btn-info">Come Back</a>

    </div>
@endsection
