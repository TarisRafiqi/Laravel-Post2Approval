<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function showPost(Post $post)
    {
        return view('users.post', ['post' => $post]);
    }

    public function showInputPostForm()
    {
        return view('users.input-post');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
        ]);

        // Tambahkan slug secara otomatis
        $validated['slug'] = str()->slug($request->input('title'));

        // Simpan data ke database
        Post::create($validated);

        return redirect('/users/posts')->with('success', 'Post berhasil dibuat!');
    }
}
