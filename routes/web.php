<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[InitController::class,'index'])->name('welcome');

Route::middleware('auth')->group(function(){
    Route::get('dashboard',[DashController::class,'index'])->name('dashboard');
    Route::get('/showBooks/{book}',[DashController::class,'show'])->name('showBooks.show');
    Route::get('/editBooks/{book}/edit',[DashController::class,'edit'])->name('editBooks.edit');
    Route::put('/editBooks/{book}',[DashController::class,'update'])->name('editBooks.update');
    Route::delete('/dashboard/{book}',[DashController::class,'destroy'])->name('dashboard.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/favorites',[FavoriteController::class,'index'])->name('favorites');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','userMiddleware')->group(function () {
    Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
});

Route::middleware('auth','userMiddleware')->group(function (){
    Route::get('/addBooks/create',[BookController::class, 'create'])->name('addBooks.create');
    Route::post('/addBooks',[BookController::class, 'store'])->name('addBooks.store');
});

require __DIR__.'/auth.php';
