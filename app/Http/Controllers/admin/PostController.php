<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function showPost($slug)
    {
        // Mengambil post
        $post = Post::where('slug', $slug)->firstOrFail();

        // Mengambil semua pengguna dengan role 'approver' dan 'admin'
        $approvers = User::where('role', 'approver')->get();
        $admins = User::where('role', 'admin')->get();

        return view('admin.post', compact('post', 'approvers', 'admins'));
    }

    public function showInputPostForm()
    {
        return view('admin.input-post');
    }

    public function store(Request $request) {
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
    
        return redirect('/admin/posts')->with('success', 'Post berhasil dibuat!');
    }

    public function updatePost(Request $request, $slug)
    {
        // Mencari post berdasarkan slug
        $post = Post::where('slug', $slug)->firstOrFail();

        // Update data post dengan nilai yang dikirimkan dari form
        $post->update([
            'uid_approve_1' => $request->uid_approve_1,
            'uid_approve_2' => $request->uid_approve_2,
            'status_1' => $request->status_1,
            'status_2' => $request->status_2,
        ]);

        // Redirect atau beri feedback kepada user
        return redirect()->route('admin.post.show', $slug)->with('success', 'Post updated successfully.');
    }
    
}
