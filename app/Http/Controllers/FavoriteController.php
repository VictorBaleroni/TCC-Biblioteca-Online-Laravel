<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    function index(Request $request){
        $searchTerm = $request->input('searchFavorite', '');

        $favorites = Favorite::with('book')->whereHas('book', function ($query) use ($searchTerm) {
            $query->where('nome', 'like', '%' . $searchTerm . '%');
        })->latest()->get();

        return view('favorites.favorite_books',['favorites' => $favorites]);
    }

    public function destroy(Favorite $favorite){
        $favorite->delete();
        return redirect()->back();
    }
}
