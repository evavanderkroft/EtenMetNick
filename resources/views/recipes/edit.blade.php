
@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 class="title">Edit a post</h1>
        <h2 class="subtitle">Upload your new photo to add on your post board.</h2>

        {{-- {{ Auth::user()->id }} --}}
        <form class="box" method="POST" action="/recipe/{{$recipe->id}}" enctype="multipart/form-data">
            @method('GET')
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


{{--            <label class="label">Upload your photo</label>--}}
{{--            <div class="file field has-name is-boxed">--}}
{{--                <label class="file-label">--}}
{{--                <span class="file-cta">--}}
{{--                    <span class="file-icon">--}}
{{--                        <i class="fas fa-upload"></i>--}}
{{--                    </span>--}}
{{--                    <span class="file-label">--}}
{{--                        Your photo--}}
{{--                    </span>--}}
{{--                </span>--}}
{{--                    <span class="file-name">--}}
{{--                    {{ $recipe->image }}--}}
{{--                </span>--}}
{{--                </label>--}}
{{--            </div>--}}

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

