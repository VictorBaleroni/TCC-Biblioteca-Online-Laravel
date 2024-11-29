<?php

namespace App\Livewire\FavoriteBook;

use Livewire\Component;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookFavorite extends Component
{
    public $book;

    public function favoritar($idBook) {
        $book = Book::find($idBook);

        $book->favorites()->create([
            'user_id' => Auth::user()->id
        ]);
    }

    public function desfavoritar(Book $book){
        $book->favorites()->delete();
    }

    public function render()
    {
        return view('livewire.favorite-book.book-favorite');
    }
}
