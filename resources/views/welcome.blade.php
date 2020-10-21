<!DOCTYPE html>
@extends('layouts.app')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
    <div class="container">
    @section('content')
            <div class="content main">
                <div class="title">
                    Eten met nick
                </div>

                <div class="description">
                   <p>Welkom op de Eten met Nick recepten pagina! Hier worden de recepten van Nick Toet op laten zien. Om te reageren moet je een account aanmaken. </p>
                </div>

                <div class="links">
                    <a href="{{route('login')}}">inloggen</a>
                    <a href="{{route('register')}}">account aanmaken</a>
                    <a href="{{route('recipe.index')}}">Recepten</a>

                </div>
            </div>
        </div>
        @endsection

    </div>
    @section('footer')
        @endsection
    </body>
</html>
