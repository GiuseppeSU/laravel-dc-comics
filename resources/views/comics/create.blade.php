@extends('layouts.app')

@section('page-title')
    <h1>Crea un nuovo fumetto</h1>
@endsection

@section('content')
    <form method="POST" action="{{ route('comics.store') }}">
        @csrf


        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">

        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Url immagine</label>
            <input type="text" class="form-control" id="thumb" name="thumb">

        </div>

        <div class="mb-3 form-floating">
            <textarea class="form-control" id="description" name="description"></textarea>
            <label for="description" class="form-label">Descrizione</label>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control" id="price" name="price">

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
