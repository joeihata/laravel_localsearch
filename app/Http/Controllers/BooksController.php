<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    //新しい本のIndexを作るページ情報を返す処理
    public function create() {
        return view('new');
    }

    //新しい本のIndexを作成する処理
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'author' => 'required',
        ]);
        $book = new Book();
            $book->title = $request->title;
            $book->price = $request->price;
            $book->author = $request->author;
            $book->summary = $request->summary;
            $book->save();
        return redirect('/home');
    }

    public function show() {
        return view('/home');
    }

    //編集画面までのデータを取ってくる処理
    public function edit($id) {
        $book = Book::findOrFail($id);
        return view('edit')->with('book', $book);
    }

    //編集の処理
    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);
            $book->title = $request->title;
            $book->price = $request->price;
            $book->author = $request->author;
            $book->summary = $request->summary;
            $book->save();
        return redirect('/home');
    }

    //本のIndexを削除したい時の処理
    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/home');
    }
}
