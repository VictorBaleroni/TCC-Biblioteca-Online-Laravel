<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


class DashController extends Controller
{
    public readonly Book $book;
    public function __construct(){
    $this->book = new Book();
    }

    public function index(Request $request){   
        return view('dashboard',['books' => Book::query()->where('nome', 'like', '%' . $request->searchBook . '%')->orwhere('autor', 'like', '%' . $request->searchBook . '%')->paginate(12)]);
    }

    public function show(Book $book){
        if($book->tipoLivro === 'isPdf'){
            return view('showBooks.showPdf.view_Pdf',['book'=>$book]);
        }elseif($book->tipoLivro === 'isEpub'){
            return view('showBooks.showEpub.view_Epub',['book'=>$book]);
        }else{
            return view('welcome');
        }
    }

    public function edit(Book $book){
        return view('editBooks.edit_book',['book'=>$book]);
    }

    public function update(Request $request, string $id){
        $book = new Book;
        $data = $request->except(['_token','_method']);

        $book->nome = $data['nome'];
        $book->autor = $data['autor'];
        $book->descricao = $data['descricao'];
        
        $book->where('id', $id)->update($data);

        return redirect()->back();
    }

    public function destroy(string $id){
        $this->book->where('id', $id)->delete();
            return redirect()->back();
    }
}
