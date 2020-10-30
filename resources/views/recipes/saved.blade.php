
@extends('layouts.app')
@section('content')


    @if(auth()->user()->is_admin == 0)
    <div class="card-deck">
        {{--            <div class="row row-cols-1 row-cols-md-3">--}}
        @foreach($recipes as $recipe)
            {{--                   <div class="col mb-4">--}}
            <div class="card">
                <img src="{{ asset('img/spaghetti.jpg')}}" alt="card-img-top" class="heightCardsImage">
                <div class="card-body">
                    <h5 class="card-title">{{$recipe->title}}</h5>
                    <p class="card-text">{{$recipe->short_description}}</p>
                    {{--                            <p class="card-text">{{$recipe->description}}</p>--}}
                </div>
                <div class="card-footer">
                    <small class="text-muted"> <a href="recipe/{{$recipe->id}}" class="btn btn-primary">Naar het recept!</a></small>

                    {{--                    </div>--}}
                </div>
            </div>
        @endforeach
    </div>
@else
    <h2>Je moet eerst op 5 verschillende dagen ingelogd zijn om recepten op te slaan!</h2>

    @endif
@endsection
