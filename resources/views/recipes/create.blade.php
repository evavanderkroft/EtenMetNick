
@extends('layouts.app')
@section('content')

    <h1 class="title">Maak een nieuw recept aan!</h1>
    <form method="POST" action="{{route('recipe.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label class="label">Title</label>
            <div class="control">
                <input class="input" type="text" name="title"
                       placeholder="Titel" value="{{ old('title') }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Korte Beschrijving</label>
            <div class="control">
                <textarea class="textarea" placeholder="Korte Beschrijving"
                          name="short_description" required value="{{ old('short_description') }}"></textarea>
            </div>
        </div>

        <div class="field">
            <label class="label">Beschrijving</label>
            <div class="control">
                <textarea class="textarea" placeholder="Beschrijving"
                          name="description" required value="{{ old('description') }}"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Categorie</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category" required value="{{old('category')}}">
                <option>Frans</option>
                <option>spaans</option>
                <option>Chinees</option>
                <option>Duits</option>
                <option>Italiaans</option>
            </select>
        </div>


        <label class="label">Upload your photo</label>
        <div class="file field has-name is-boxed">
            <label class="file-label">
                <input class="file-input" type="file" name="image" required value="{{ old('image') }}">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Choose a Photo…
                    </span>
                </span>
                <span class="file-name">
                    Photo
                </span>
            </label>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
            <div class="control">
                <button class="button is-text">Cancel</button>
            </div>
        </div>
    </form>
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
