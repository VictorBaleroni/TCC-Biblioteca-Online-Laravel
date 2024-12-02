<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    function index(Request $request){
        $searchfav = $request->input('searchFavorite', '');

        $favorites = Favorite::with('book')->whereHas('book', function ($query) use ($searchfav) {
            $query->where('nome', 'like', '%' . $searchfav . '%')->orwhere('genero', 'like', '%' . $searchfav . '%');
        })->latest()->get();

        return view('favorites.favorite_books',['favorites' => $favorites]);
    }

    public function destroy(Favorite $favorite){
        $favorite->delete();
        return redirect()->back();
    }
}
