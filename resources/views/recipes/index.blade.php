@extends('layouts.app')
@section('content')

    <div class="container">
{{--    <div class="flex-center position-ref full-height">--}}
        <div class="content">
            <div class="title">
                Recepten!
            </div>
        </div>

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
                            @if(Auth::user()->id == $recipe->user_id)

{{--                                <form method="post" action="{{route('recipe.edit', $recipe->id)}}">--}}
{{--                                    @csrf @method('PUT')--}}
{{--                                    <button class="btn btn-primary" type="submit">edit2</button>--}}
{{--                                </form>--}}

                            <small class="text-muted"><a href=/recipe/{{$recipe->id}}/edit class="btn btn-primary">Edit</a></small>

                                <form method="post" action="{{route('recipe.destroy', $recipe->id)}}">
                                @csrf @method('DELETE')
                                    <button class="btn btn-primary" type="submit">Verwijderen</button>
                                </form>

{{--                            <small class="text-muted"><a  class="btn btn-primary">delete</a></small>--}}
                                @endif
{{--                    </div>--}}
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

