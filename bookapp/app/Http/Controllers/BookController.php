<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books= Book::all();
        $books = DB::select('select * from books');
        return view('books',['books'=>$books]);
    }



    public function add(Request $request)
    {
        $rules = [
            'txt' => 'required'
        ];
        $this->validate($request, $rules);
        $txt = $request->txt;
        $response = response()->view('book.index', ['txt' => $txt . 'をクッキーに保存しました']);
        $response->cookie('txt', $txt, 100);
        return $response;
    }



    public function create(Request $request)
    {
        $text = $request->name;
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $books = new Book;
        $books->title = $request->name;
        $books->save();
        return redirect('/');
    }

    public function find(Request $request)
    {
        return view('find', ['input' => '']);
    }

    
    public function search(Request $request)
    {
        $books = Book::where('name', $request->input)->first();
        $param = [
            'input' => $request->input,
            'book' => $books
        ];
        return view('find', $param);
    }

    public function delete(Request $request)
    {
        $books = Book::find($request->title);
        return view('delete',['form'=>$books]);
    }

    public function remove(Request $request)
    {
        Book::find($request->title)->delete();
        return redirect('/');

    }



}
