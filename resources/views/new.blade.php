@extends('layouts.app')

@section('title', 'New Book Index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <a href="{{ url('/home') }}" class="header-menu">Back</a>
          <div class="panel panel-default">
              @if (Route::has('login'))
                @auth

                  <form method="post" action="{{ url('/post') }}">
                    {{ csrf_field() }}

                    <div>
                      <h5>Book's Title</h5>
                        <input type="text" name="title"><br>
                        @if ($errors->has('title'))
                          <span class="error">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div>
                      <h5>Price</h5>
                        <input type="text" name="price"><br>
                        @if ($errors->has('price'))
                          <span class="error">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <div>
                      <h5>Author</h5>
                        <input type="text" name="author"><br>
                        @if ($errors->has('Author'))
                          <span class="error">{{ $errors->first('Author') }}</span>
                        @endif
                    </div>

                    <div>
                      <h5>Summary</h5>
                        <textarea name="summary"></textarea><br>
                        @if ($errors->has('summary'))
                          <span class="error">{{ $errors->first('summary') }}</span>
                        @endif
                    </div>

                    <button type="submit">Make Book Index</button>

                  </form>
                @else
                  <a href="{{ route('login') }}">Login</a>
                  <a href="{{ route('register') }}">Register</a>
                @endauth
              @endif
          </div>
        </div>
    </div>

</div>
@endsection