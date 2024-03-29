@extends('layouts.app')

@section('page-title', 'Fumetti')
@section('content')
    <div class="text-center my-3">
        <a href="{{ route('comics.create') }}" class="btn btn-primary ">Crea il fumetto dei tuoi sogni</a>


    </div>

    <div class="container">
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-3">
                    <div class="card my-3 text-center">
                        <h1 class="fs-5 text-center">{{ $comic->title }}</h1>
                        <img src={{ $comic->thumb }} class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{ $comic->description }}</p>
                            <p>{{ $comic->price }}$</p>
                            <div class="d-flex justify-content-center">
                                <a type="button" class="btn btn-danger me-2"
                                    href={{ route('comics.show', ['comic' => $comic->id]) }}>Show
                                </a>
                                <a type="button" class="btn btn-info"
                                    href={{ route('comics.edit', ['comic' => $comic->id]) }}>Modifica
                                </a>
                                <form action={{ route('comics.destroy', ['comic' => $comic->id]) }} method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ms-2">Rimuovi</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>






@endsection
