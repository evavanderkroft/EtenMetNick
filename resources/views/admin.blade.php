@extends('layouts.app')

@section('content')

<div class="tableAdmin">
    <table class="table table-bordered table-hover table-secondary">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">short description</th>
            <th scope="col">description</th>
            <th scope="col">category</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach( $recipes as $recipe)
            <th scope="row">{{$recipe->id}}</th>
            <td>{{$recipe->title}}</td>
            <td>{{$recipe->short_description}}</td>
            <td>{{$recipe->description}}</td>
            <td>{{$recipe->category}}</td>
            <td><small class="text-muted"><a href=/recipe/{{$recipe->id}}/edit class="btn btn-primary">Edit</a></small></td>
            <td>
                <form method="post" action="{{route('recipe.destroy', $recipe->id)}}">
                    @csrf @method('DELETE')
                    <button class="btn btn-primary" type="submit">Verwijderen</button>
                </form></td>

        </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection
