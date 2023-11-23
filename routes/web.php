<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pages\PagesController;
use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;


Route::controller(PagesController::class)->group(function (){
    Route::get('/', 'home')->name('home');
    Route::get('blog/{post:slug}', 'post')->name('post');
});

Route::redirect('dashboard', 'posts')->name('dashboard');

Route::resource('posts', PostController::class)->middleware(['auth', 'verified'])->except(['show'])->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
