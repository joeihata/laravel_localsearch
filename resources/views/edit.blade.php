@extends('layouts.app')

@section('title', 'Edit Book Index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <a href="{{ url('/home') }}" class="header-menu">Back</a>

          <div class="panel panel-default">
              @if (Route::has('login'))
                @auth

                  <form method="post" action="{{ url('/', $book->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}

                    <div>
                        <h5>Book's Title</h5>
                        <input type="text" name="title" value="{{ old('title', $book->title) }}">
                        {{-- バリデーション　--}}
                        @if ($errors->has('title'))
                            <span class="error">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div>
                        <h5>Price</h5>
                        <input type="text" name="price" value="{{ old('price', $book->price) }}">
                        {{-- バリデーション　--}}
                        @if ($errors->has('price'))
                            <span class="error">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <div>
                        <h5>Author</h5>
                        <input type="text" name="author" value="{{ old('author', $book->author) }}">
                        {{-- バリデーション　--}}
                        @if ($errors->has('author'))
                            <span class="error">{{ $errors->first('author') }}</span>
                        @endif
                    </div>

                    <div>
                        <h5>Summary</h5>
                        <textarea name="summary">{{ old('summary', $book->summary) }}</textarea><br>
                        @if ($errors->has('summary'))
                          <span class="error">{{ $errors->first('summary') }}</span>
                        @endif
                    </div>

                    <button type="submit" value="Update">Update!</button>
                  </form>
                @else
                  <a href="{{ route('login') }}">ログイン</a>
                  <a href="{{ route('register') }}">会員登録する</a>
                @endauth
              @endif
          </div>
        </div>
    </div>

</div>
@endsection