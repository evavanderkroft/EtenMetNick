<!DOCTYPE html>

@extends('layouts.app')


    <head>
        <title>Recepten</title>
    </head>
    <body>
    @section('content')
    <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    Recepten!
                </div>

                <div class="links">
                    <a href="{{route('welcome')}}">terug</a>

                </div>
            </div>
            </div>
        @endsection
    </body>
</html>
