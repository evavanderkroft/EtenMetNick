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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title">
                    Eten met Nick
                </div>

                <div class="description">
                   <p>Welkom op de Eten met Nick recepten pagina! Hier worden de recepten van Nick Toet op laten zien. Om te reageren moet je een account aanmaken. </p>
                </div>

                <div class="links">
                    <a href="{{route('login')}}">inloggen</a>
                    <a href="{{route('newAccount')}}">account aanmaken</a>
                    <a href="{{route('recipe')}}">Recepten</a>

                </div>
            </div>
        </div>
    </body>
</html>