<!DOCTYPE html>
@extends('layouts.app')

    <body>
    @section('content')
    <div class="container">
            <div class="content main">
                <div class="title">
                    Eten met nick
                </div>

                <div class="description">
                   <p>Welkom op de Eten met Nick recepten pagina! Hier worden de recepten van Nick Toet op laten zien. Om de recepten te zien moet je een account aanmaken. </p>
                </div>

                <div class="links">
                    <a href="{{route('login')}}">inloggen</a>
                    <a href="{{route('register')}}">account aanmaken</a>
                    <a href="{{route('recipe.index')}}">Recepten</a>

                </div>
            </div>
        </div>
        @endsection


    @section('footer')
        @endsection
    </body>

