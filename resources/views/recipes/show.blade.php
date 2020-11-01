
    @extends('layouts.app')

@section('content')


    <section class="section">
        <div class="container">
            <div class="card box">
                <div class="card-content">
                    <div class="media">
                        <div class="media-content">

                                <p class="title is-4">{{$recipe->title}}</p>
                            <img src="{{ asset('img/spaghetti.jpg')}}" class="card-img-top" alt="card image cap" style="width: 18rem;">
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
            </div>
        </div>
        <div class="links">
            <a class="links" href="{{route('recipe.index')}}">Terug naar recepten</a>
        </div>
    </section>



    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

