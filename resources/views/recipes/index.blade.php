@extends('layouts.app')
@section('content')

    <div class="container">
{{--    <div class="flex-center position-ref full-height">--}}
        <div class="content">
            <div class="title">
                Recepten!
            </div>
            <form method="POST" action="{{route('recipe.category')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                        <option>None</option>
                        <option>Frans</option>
                        <option>spaans</option>
                        <option>Chinees</option>
                        <option>Duits</option>
                        <option>Italiaans</option>
                    </select>
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>

            <form method="GET" action= {{route('recipe.search')}}>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="zoeken" aria-label="Zoeken" aria-describedby="button-addon2">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
            </form>
{{--            <div class="input-group mb-3">--}}
{{--            <div class="input-group">--}}
{{--                <select class="custom-select" id="inputGroupSelect04">--}}
{{--                    <option selected>Choose...</option>--}}
{{--                    <option value="1">One</option>--}}
{{--                    <option value="2">Two</option>--}}
{{--                    <option value="3">Three</option>--}}
{{--                </select>--}}
{{--                <div class="input-group-append">--}}
{{--                    <button class="btn btn-outline-secondary" type="button">Button</button>--}}
{{--                </div>--}}
{{--            </div>--}}
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

                                <label class="switch ml-3">
                                    <input name="is_available" value="{{ $recipe->is_saved}}" type="checkbox" onclick='submit()' @if( $recipe->is_saved) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </form>
                        </div>
                    </div>
        </div>
                @endforeach



        <div class="content">
            <div class="links">
                <a href="{{route('welcome')}}">terug</a>
                @if(auth()->user()->is_admin == 1)
                <a href="{{route('recipe.create')}}">creeer een recept</a>
                @endif
            </div>
        </div>
    </div>

{{--    </div>--}}
@endsection

