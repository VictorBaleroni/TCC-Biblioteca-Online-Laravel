<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function index(Request $request){
        $categoriasFavoritas = Book::whereHas('favorites', function ($query) {
            $query->where('user_id',  Auth::user()->id);
        })->pluck('genero')->unique();

        $livrosRecomendados = Book::whereIn('genero', $categoriasFavoritas)
        ->whereDoesntHave('favorites', function ($query) {
            $query->where('user_id', Auth::user()->id); // Excluir livros que o usuário já favoritou
        })
        ->withCount('likes') // Contar o número de likes de cada livro
        ->orderByDesc('likes_count'); // Ordenar pelos mais curtidos


        $livrosRestantes = Book::whereNotIn('genero', $categoriasFavoritas)
        ->withCount('likes')
        ->orderByDesc('likes_count'); // Ordenar pelos mais curtidos

      
        $livrosOrdenados = $livrosRecomendados->union($livrosRestantes)->get();

            return view('dashboard',['books' => Book::query()->where('nome', 'like', '%' . $request->searchBook . '%')
            ->orwhere('autor', 'like', '%' . $request->searchBook . '%')
            ->orwhere('genero', 'like', '%' . $request->searchBook . '%')->paginate(12), 'similarBooks' => $livrosOrdenados]);
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
        Book::where('id', $id)->delete();
            return redirect()->back();
    }
}
