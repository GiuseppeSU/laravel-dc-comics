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
@endsection
