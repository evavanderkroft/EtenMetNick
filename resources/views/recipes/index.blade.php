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
                            <small class="text-muted"> <a href="recipe/{{$recipe->id}}" class="btn btn-primary">Naar het recept!</a></small>
                            @if(Auth::user()->id == $recipe->user_id)
                                <form method="post" action="{{route('recipe.update', $recipe->id)}}">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-primary" type="submit">edit2</button>
                                </form>

{{--                            <small class="text-muted"><a href= class="btn btn-primary">Edit</a></small>--}}

                                <form method="post" action="{{route('recipe.destroy', $recipe->id)}}">
                                @csrf @method('DELETE')
                                    <button class="btn btn-primary" type="submit">Verwijderen</button>
                                </form>
                        </div>
{{--                            <small class="text-muted"><a  class="btn btn-primary">delete</a></small>--}}
                                @endif
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

    <div class="field is-grouped">
        @if(Auth::user()->id == $recipe->user_id)
            <p class="control">
                <a class="button is-primary" href="/recipe/{{$recipe->id}}/edit">Edit</a>
            </p>
            <p class="control">
                <a class="button is-primary is-danger"
                   href="/recipe/{{$recipe->id}}/delete">Delete</a>
            </p>
    @endif
{{--    </div>--}}
@endsection

