@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if(Auth::check())
                        Hi {{ Auth::user()->name }}
                @if($datediv >=5)
                <h5> U bent al {{$datediv}} dagen een gebruiker! U kunt nu recepten liken en disliken. </h5>
                    @else
                        <h5> U bent nu {{$datediv}} dagen een gebruiker! Als u 5 dagen een gebruiker bent, kunt u recepten liken en disliken. </h5>
                    @endif
                        <h4> pas uw gegevens aan:</h4>

                    <form class="box" method="POST" action={{route('home.update', Auth::user()->id)}} enctype="multipart/form-data">
                        @method('PATCH')
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
                                <div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>

                            @if ($errors->any())
                                <div class="notification is-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </form>

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
