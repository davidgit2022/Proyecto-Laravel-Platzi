<?php

namespace App\Http\Controllers\Pages;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PagesController extends Controller
{
    public function home(Request $request) 
    {
        $search = $request->search;
        $posts = Post::where('title', 'LIKE', "%{$search}%")
        ->with('user')
        ->latest()->paginate();
        return view('home', ['posts' => $posts]);
    }

    public function post(Post $post){

        return view('post', ['post' => $post]);
    }
}
