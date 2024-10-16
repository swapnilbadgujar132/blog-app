<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
            'commenter_name' => 'required',
        ]);
        //dd($post);
        $post->comments()->create([
            'content' => $request->input('content'),
            'commenter_name' => $request->input('commenter_name'),
            'post_id' => $post->post_id,  
        ]);

        return back()->with('success', 'Comment added successfully!');
    }
}

