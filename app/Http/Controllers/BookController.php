<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;


class BookController extends Controller
{
    public readonly Book $book;
    public function __construct(){
    $this->book = new Book();
    }

    public function create()
    {
        return view('addBooks.add_book');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required',
            'autor' => 'required',
            'descricao' => 'required',
            'capa' => [
                'required',
             File::types(['jpg','png'])
            ],
            'livro' => [
                'required',
             File::types(['pdf'])
            ],
        ],[
            'nome.required' => 'O campo nome não foi preenchido',
            'autor.required' => 'O campo autor não foi preenchido',
            'descricao.required' => 'O campo descricao nao foi preenchido',
            'capa.required' => 'Nenhuma capa encontrada',
            'capa.mimes' => 'Arquivo tem que ser jpg ou png',
            'livro.required' => 'Nenhum livro encontrado',
            'livro.mimes' => 'Arquivo tem que ser pdf',
        ]);
        
        $book = $this->book;
        $book->nome = $request->nome;
        $book->autor = $request->autor;
        $book->descricao = $request->descricao;

        $nomeCapa = $request->capa->getClientOriginalName();
        $book->capa = $nomeCapa;

        $nomePdf = $request->livro->getClientOriginalName();
        $book->livro = $nomePdf;
        
        $book->save();
        return redirect()->back();
    }
    
}
