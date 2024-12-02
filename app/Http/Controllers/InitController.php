<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class InitController extends Controller
{
    function index(Request $request){
        
        return view('welcome',['books' => Book::query()->where('nome', 'like', '%' . $request->searchBook . '%')
        ->orwhere('autor', 'like', '%' . $request->searchBook . '%')->paginate(12)]);
    }
}
