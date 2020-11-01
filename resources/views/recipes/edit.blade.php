
@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 class="title">Pas het recept aan.</h1>
        <h2 class="subtitle">Verander de gegevens van het recept:</h2>

        {{-- {{ Auth::user()->id }} --}}
        <form class="box" method="POST" action="/recipe/{{$recipe->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input class="input" type="text" name="title" placeholder="Title" value="{{ $recipe->title }}">
                </div>
            </div>

            <div class="field">
                <label class="label">Short_description</label>
                <div class="control">
                        <textarea class="textarea" placeholder="Short_description"
                          name="short_description">{{ $recipe->short_description }}
                        </textarea>
                </div>
            </div>
            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                <textarea class="textarea" placeholder="Description"
                          name="description">{{ $recipe->description }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Categorie</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category"  value="{{$recipe->category }}">
                    <option>Frans</option>
                    <option>spaans</option>
                    <option>Chinees</option>
                    <option>Duits</option>
                    <option>Italiaans</option>
                </select>
            </div>

            <div>
                <div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Cancel</button>
            </div>
        </form>

    </div>
    </div>
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


