<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'autor',
        'descricao',
        'capa',
        'tipoLivro',
        'livro',
        'genero',
    ];
   
    public function favorites(){
        return $this->hasMany(Favorite::class)->where(function ($query){
            if(Auth::check()){
            $query->where('user_id', Auth::user()->id);
            }
        });
    }

    public function likes(){
        return $this->belongsToMany(User::class,'likes')->withTimestamps();
    }
}
