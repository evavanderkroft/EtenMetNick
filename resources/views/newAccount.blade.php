<!DOCTYPE html>

@extends('layouts.app')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nieuw account</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

    @section('content')
    <div class="flex-center position-ref full-height2">
            <div class="content">
                <div class="title">
                    Maak een nieuw account aan!
                </div>
            </div>
            </div>
    </body>
</html>


    <form>
        <div class="container">
            <div class="form-row">
                <div class="col">
                    <label for="exampleInputEmail1">Naam</label>
                    <input type="text" class="form-control" placeholder="Naam">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email adres</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@gmail.com">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{route('welcome')}}" role="button">Terug</a>
        </div>
    </form>

{{--    <div class="links">--}}

{{--    </div>--}}

{{--    <section class="section">--}}
{{--        <div class="container">--}}
{{--            <form method="POST" action="{{ route('recipe') }}">--}}
{{--                @csrf--}}
{{--                <div class="field">--}}
{{--                    <p class="control has-icons-left has-icons-right">--}}
{{--                        <input class="input {{ $errors->has('name') ? 'is-danger' :'' }}" type="text" name="name"--}}
{{--                               placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}
{{--                        <span class="icon is-small is-left">--}}
{{--                        <i class="fas fa-envelope"></i>--}}
{{--                    </span>--}}
{{--                        <span class="icon is-small is-right">--}}
{{--                        <i class="fas fa-check"></i>--}}
{{--                    </span>--}}
{{--                    </p>--}}
{{--                    @error('email')--}}
{{--                    <span class="is-danger has-text-danger" role="alert">--}}
{{--                    {{ $message }}--}}
{{--                </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="field">--}}
{{--                    <p class="control has-icons-left has-icons-right">--}}
{{--                        <input class="input {{ $errors->has('email') ? 'is-danger' :'' }}" type="email" placeholder="Email"--}}
{{--                               value="{{ old('email') }}" required autocomplete="email" name="email">--}}
{{--                        <span class="icon is-small is-left">--}}
{{--                        <i class="fas fa-envelope"></i>--}}
{{--                    </span>--}}
{{--                        <span class="icon is-small is-right">--}}
{{--                        <i class="fas fa-check"></i>--}}
{{--                    </span>--}}
{{--                    </p>--}}
{{--                    @error('email')--}}
{{--                    <span class="is-danger has-text-danger" role="alert">--}}
{{--                    {{ $message }}--}}
{{--                </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="field">--}}
{{--                    <p class="control has-icons-left">--}}
{{--                        <input class="input {{ $errors->has('password') ? 'is-danger' :'' }}" type="password"--}}
{{--                               placeholder="Password" name="password" required autocomplete="new-password">--}}
{{--                        <span class="icon is-small is-left">--}}
{{--                        <i class="fas fa-lock"></i>--}}
{{--                    </span>--}}
{{--                    </p>--}}
{{--                    @error('email')--}}
{{--                    <span class="is-danger has-text-danger" role="alert">--}}
{{--                    {{ $message }}--}}
{{--                </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="field">--}}
{{--                    <p class="control has-icons-left">--}}
{{--                        <input class="input {{ $errors->has('password') ? 'is-danger' :'' }}" type="password"--}}
{{--                               placeholder="Password Confirm" name="password_confirmation" required--}}
{{--                               autocomplete="new-password">--}}
{{--                        <span class="icon is-small is-left">--}}
{{--                        <i class="fas fa-lock"></i>--}}
{{--                    </span>--}}
{{--                    </p>--}}
{{--                    @error('email')--}}
{{--                    <span class="is-danger has-text-danger" role="alert">--}}
{{--                    {{ $message }}--}}
{{--                </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="field">--}}
{{--                    <p class="control">--}}
{{--                        <button type="submit" class="button is-success">--}}
{{--                            Login--}}
{{--                        </button>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </section>--}}

@endsection
