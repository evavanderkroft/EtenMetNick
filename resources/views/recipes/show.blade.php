
    @extends('layouts.app')

@section('content')

    <section class="hero is-medium is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    {{$recipe->title}}
                </h1>
            </div>
        </div>
    </section>
    <section class="section">

        <div class="container">
            @if($errors->any())
                {{-- {{dd($errors)}} --}}
                @foreach ($errors as $error)
                    <h4>{{$errors->first()}}</h4>
                    <div class="notivication is-danger">
                        <p>{{$errors}}</p>
                    </div>
                @endforeach
            @endif

            <div class="card box">
{{--                <div class="card-image">--}}
{{--                    <figure class="image is-square">--}}
{{--                        <img src="{{ asset("storage/photos/" . "$recipe->image") }}" >--}}
{{--                    </figure>--}}
{{--                </div>--}}
                <div class="card-content">
                    <div class="media">
                        <div class="media-content">
{{--                            <a href="">--}}
                                <p class="title is-4">{{$recipe->title}}</p>
{{--                            </a>--}}
                            <img src="{{ asset('img/spaghetti.jpg')}}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="content">
                        <strong>
                        {{$recipe->short_description}}</strong>
                        <br>
                        <br>
                        <strong>
                            {{$recipe->description}}
                        </strong>


                        <br>
                        <br>
                        <time class="is-right" datetime="{{ $recipe->created_at }}">{{ $recipe->created_at }}</time>
                    </div>
                </div>

{{--                        @if($photo->likes->firstWhere('user_id', Auth::user()->id))--}}
{{--                            <p class="control">--}}
{{--                            <form action="{{route('like.delete', $photo->id)}}" method="post">--}}
{{--                                @method('delete')--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="photo_id" value="{{$photo->id}}">--}}
{{--                                <button class="button is-danger" value="delete" type="submit">--}}
{{--                                    <i class="fas fa-heart"></i>--}}
{{--                                </button>--}}

{{--                            </form>--}}
{{--                            </p>--}}
{{--                        @else--}}
{{--                            <p class="control">--}}

{{--                            <form action="{{route('like.store', $photo->id)}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="photo_id" value="{{$photo->id}}">--}}
{{--                                <button class="button is-danger" type="submit"><i class="far fa-heart"></i></button>--}}

{{--                            </form>--}}
{{--                            </p>--}}
{{--                        @endif--}}






            </div>
        </div>
    </section>

{{--    <section class="section">--}}
{{--        <div class="container">--}}

{{--            @foreach($recipe->comments as $comment)--}}
{{--                <article class="media">--}}

{{--                    <div class="media-content">--}}
{{--                        <div class="content">--}}
{{--                            <p>--}}
{{--                                <strong>{{$comment->user->name}}</strong>--}}
{{--                                <br>--}}
{{--                                {{$comment->description}}--}}
{{--                                <br>--}}
{{--                                <small><time class="is-right is-family-code"--}}
{{--                                             datetime="{{ $comment->created_at }}">{{ $comment->created_at }}</time></small>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </article>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="section">
        <div class="container">
            <form action="/comment" method="POST">
                @csrf
                <input type="hidden" name="photo_id" value="{{$recipe->id}}">
                <article class="media">
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea name="description" class="textarea" placeholder="Add a comment..."></textarea>
                            </p>
                        </div>
                        <nav class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <button type="submit" class="button is-info">Add</button>
                                </div>
                            </div>
                        </nav>
                    </div>
                </article>
            </form>
        </div>
        <div class="links ">
            <a href="{{route('recipe.index')}}">terug</a>
        </div>
    </section>

@endsection

