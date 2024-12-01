<?php

namespace App\Livewire\LikeBook;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BookLike extends Component
{
    public $book;

    public function like($idBook){
        $liker = Auth::user();

        $liker->likes()->attach($idBook);
    }

    public function deslike($idBook){
        $liker = Auth::user();

        $liker->likes()->detach($idBook);
    }

    public function render()
    {
        return view('livewire.like-book.book-like');
    }
}
