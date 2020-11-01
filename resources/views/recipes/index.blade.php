@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="content">
            <div class="title">
                Recepten!
            </div>
            <form method="POST" action="{{route('recipe.category')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Categorieen</label>
                    <div class="input-group mb-3">
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                        <option>Geen categorie</option>
                        <option>Frans</option>
                        <option>spaans</option>
                        <option>Chinees</option>
                        <option>Duits</option>
                        <option>Italiaans</option>
                    </select>
                    <div class="control">
                        <button class="btn btn-info" type="submit">Submit</button>
                    </div>
                    </div>
                </div>
            </form>

            <form method="GET" action= {{route('recipe.search')}}>
                <div class="form-group">
                <label for="exampleFormControlSelect1">Zoeken</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="zoeken" aria-label="Zoeken" aria-describedby="button-addon2">
                <div class="control">
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </div>
            </div>
            </form>
        </div>

        <div class="card-deck">
                @foreach($recipes as $recipe)
                    <div class="card">
                        <img src="{{ asset('img/spaghetti.jpg')}}" alt="card image cap" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{$recipe->title}}</h5>
                            <p class="card-text">{{$recipe->short_description}}</p>
                            <h4><span class="badge badge-secondary">{{$recipe->category}}</span></h4>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"> <a href="recipe/{{$recipe->id}}" class="btn btn-primary">Naar het recept!</a></small>

            @if($ShowLike)
                          <form method="post" action="/recipes/{{$recipe->id}}/like">
                              @csrf
                              @if($recipe->isLikedBy())
                              <button type="submit" class="btn btn-secondary" disabled>Like</button>
                                  @else
                                  <button type="submit" class="btn btn-success">Like</button>
                                  @endif
                          </form>


                              <form method="post" action="/recipes/{{$recipe->id}}/like">
                                  @csrf
                                  @method('DELETE')
                                  @if($recipe->isDislikedBy())
                                  <button type="submit" class="btn btn-secondary" disabled>Dislike</button>
                              @else
                              <button type="submit" class="btn btn-danger">Dislike</button>
                                  @endif
                                </form>

                                @endif
                        </div>
                    </div>
            @endforeach
        </div>

        <div class="content">
            <div class="links">
                <a href="{{route('welcome')}}">terug</a>
                @if(auth()->user()->is_admin == 1)
                <a href="{{route('recipe.create')}}">creeer een recept</a>
                @endif
            </div>
        </div>
    </div>

@endsection

