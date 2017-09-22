
@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center">

        @foreach($chirps as $chirp)
            <div class="jumbotron chirp" id="chirp-{{ $chirp->id }}">
                <div>by
                    <b>{{ $chirp->author->name  }}</b>
                    on
                    <small>{{ $chirp->posted_at }}</small>
                </div>

                <div>
                    <p>{{ $chirp->text }}</p>
                </div>

                <div class="row">
                    <button type="button" id="like-btn-{{ $chirp->id }}" onclick="actOnChirp(event);" data-chirp-id="{{ $chirp->id }}">Like</button>
                    <span id="likes-count-{{ $chirp->id }}">{{ $chirp->likes_count }}</span>
                </div>


            </div>
        @endforeach
    </div>
@endsection