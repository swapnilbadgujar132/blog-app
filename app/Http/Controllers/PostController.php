<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $query = Post::query();
        $posts = $query->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required|min:10',
            'author_name' => 'required',
            'published_at' => 'required|date',
        ]);
        
        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post) {
        $post_comments = $post->comments;
        return view('posts.show', [
            'post_details' => $post,   
            'post_comments' => $post_comments 
        ]);
    }

    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->post_id . ',post_id', 
            'content' => 'required|min:10',
            'author_name' => 'required',
            'published_at' => 'required|date',
        ]);
        // dd($post);
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
