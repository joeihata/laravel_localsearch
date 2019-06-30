@extends('layouts.app')

@section('content')
    <div class="top-wrapper">
        <h1>地域づくりの一歩を踏み出す</h1>
        <h4>Local Searchは地方創生の情報を検索するサイトです</h4>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
            <div class="card">
                <div class="card-header">Find Something About Local!!</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                    <button class="new-index">
                        <a href="{{ url('/new') }}" class="header-menu">Create New Index</a>
                    </button>
                        <table class="table">
                            <tr>
                                <th>Book</th>
                                <th>price</th>
                                <th>author</th>
                                <th>summary</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            @forelse ($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ number_format($book->price).'円' }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->summary }}</td>
                                    <td><a href="{{ action('BooksController@edit', $book) }}" class="edit"> edit </a></td>
                                    <td>
                                        <form method="post" action="{{ url('/posts', $book->id) }}" id="form_{{ $book->id }}">
                                            <input type="submit" class="del" data-id="{{ $book->id }}" value=" delete ">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Index Yet</td>
                                    <td>-</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
