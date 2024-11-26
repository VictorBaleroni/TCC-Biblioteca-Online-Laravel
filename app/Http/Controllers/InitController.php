<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class InitController extends Controller
{
    function index(){
        $books = new Book();
        return view('welcome',['books' => $books->all()]);
    }
}
