
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


    <script>
        var updateChirpStats = {
            Like: function (chirpId) {
                document.querySelector('#likes-count-' + chirpId).textContent++;
            },

            Unlike: function(chirpId) {
                document.querySelector('#likes-count-' + chirpId).textContent--;
            }
        };


        var toggleButtonText = {
            Like: function(button) {
                button.textContent = "Unlike";
            },

            Unlike: function(button) {
                button.textContent = "Like";
            }
        };

        var actOnChirp = function (event) {
            var chirpId = event.target.dataset.chirpId;
            var action = event.target.textContent;
            toggleButtonText[action](event.target);
            updateChirpStats[action](chirpId);
            axios.post('/chirps/' + chirpId + '/act',
                { action: action });
        };


        Echo.channel('chirp-events')
            .listen('ChirpAction', function (event) {
                var action = event.action;
                updateChirpStats[action](event.chirpId);
            })

    </script>
@endsection