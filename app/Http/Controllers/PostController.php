<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(){
        abort_if(Gate::denies('post_index'), 403);
        $posts = Post::paginate(6);
        return view('post.index', compact('posts'));
    }

    public function create(){
        abort_if(Gate::denies('post_create'), 403);
        return view('post.create');
    }

    public function store(Request $request){
        $post = Post::create($request->all());
        return redirect()->route('posts.show', $post)->with(['success' => 'Post creado exitosamente', 'icon' => 'success']);
    }

    public function show(Post $post){
        abort_if(Gate::denies('post_show'), 403);
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        abort_if(Gate::denies('post_edit'), 403);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $post->update($request->all());
        return redirect()->route('posts.show', $post->id)->with(['success' => 'Actualizado correctamente', 'icon' => 'info']);
    }

    public function delete(Post $post){
        abort_if(Gate::denies('post_destroy'), 403);
        $post->delete();
        return /* redirect()-> */back();/*->route('posts.index')->with(['success' => 'Eliminado correctamente', 'icon' => 'warning']) */;
    }
}
