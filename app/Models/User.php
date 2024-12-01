<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isADM(): bool{
        if($this->typeUser == 'admin'){
            return true;
        }else{
            return false;
        }
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    public function likes(){
        return $this->belongsToMany(Book::class,'likes')->withTimestamps();
    }

    public function likesBooks(Book $book){
        return $this->likes()->where('book_id', $book->id)->exists();
    }
}
