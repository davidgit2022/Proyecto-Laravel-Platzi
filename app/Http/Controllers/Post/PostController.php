<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index() 
    {
        return view('post.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('post.create', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'body' => 'required'
        ],[
            'title.required' => 'Este campo es requerido',
            'slug.required' => 'Este campo es requerido',
            'slug.unique' => 'Este campo es debe ser unico',
            'body.required' => 'Este campo es requerido' 
        ]);

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body
        ]);

        return redirect()->route('posts.edit', $post);
        /* return view('post.index', [
            'posts' => Post::latest()->paginate()
        ]); */
    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' .$post->id,
            'body' => 'required'
        ],[
            'title.required' => 'Este campo es requerido',
            'slug.required' => 'Este campo es requerido',
            'slug.unique' => 'Este campo es debe ser unico',
            'body.required' => 'Este campo es requerido' 
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body
        ]);

        return redirect()->route('posts.edit', $post);
        /* return view('post.index', [
            'posts' => Post::latest()->paginate()
        ]); */
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
