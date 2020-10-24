@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                @if(Auth::check())
                    @if(auth()->user()->is_admin == 1)
                        <a href="{{url('admin/routes')}}">Secret Admin Page</a>
                    @else
                        Hi {{ Auth::user()->name }}

                        <h4> pas uw gegevens aan:</h4>

                        <form class="box" method="POST" action={{route('home.index')}} enctype="multipart/form-data">
{{--                            @method('PUT')--}}
                            @csrf

                            <div class="field">
                                <label class="label">Naam</label>
                                <div class="control">
                                    <input class="input" type="text" name="name" value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">email</label>
                                <div class="control">
                        <textarea class="textarea" placeholder="email"
                                  name="email">{{ $user->email }}
                        </textarea>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">wachtwoord</label>
                                <div class="control">
                <textarea class="textarea" placeholder="password"
                          name="password">{{ $user->password }}</textarea>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                            <div>
{{--                                <button class="btn btn-primary" href="{{route('/')}}" >Cancel</button>--}}
                            </div>
                        </form>
                    @endif
                @else
                    log in.
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
