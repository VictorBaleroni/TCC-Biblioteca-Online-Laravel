<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;


class DashController extends Controller
{
    public readonly Book $book;
    public function __construct(){
    $this->book = new Book();
    }

    public function index(){
        $books = $this->book->all();
        return view('dashboard',['books'=>$books]);
    }

    public function show(Book $book){
        return view('showBooks.show_book',['book'=>$book]);
    }
    
    public function destroy(string $id){
        $this->book->where('id', $id)->delete();
            return redirect()->back();
    }
}
