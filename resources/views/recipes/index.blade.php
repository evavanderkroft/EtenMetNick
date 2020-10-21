@extends('layouts.app')
@section('content')

    <div class="container">
{{--    <div class="flex-center position-ref full-height">--}}
        <div class="content">
            <div class="title">
                Recepten!
            </div>
        </div>
            <div class="row row-cols-1 row-cols-md-3 card-deck">
                @foreach($recipes as $recipe)
                    <div class="col mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('img/spaghetti.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$recipe->title}}</h5>
                            <p class="card-text">{{$recipe->short_description}}</p>
{{--                            <p class="card-text">{{$recipe->description}}</p>--}}
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"> <a href="#" class="btn btn-primary">Go somewhere</a></small>
                        </div>
                    </div>
                    </div>
                @endforeach
    </div>
<div class="content">
            <div class="links">
                <a href="{{route('welcome')}}">terug</a>
                <a href="{{route('recipe.create')}}">creeer een recept</a>

            </div>
        </div>
    </div>
{{--    </div>--}}
@endsection

