<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;


class PostsTableController extends Controller
{
    // Tampilkan Posts page
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::with(['approver1', 'approver2'])->get();

        // Map status values to their respective labels
        $posts = $posts->map(function ($post) {
            $post->status_1 = $this->mapStatus($post->status_1);
            $post->status_2 = $this->mapStatus($post->status_2);
            $post->title = Str::limit($post->title, 50);
            return $post;
        });

        return view('users.posts', ['posts' => $posts]);
    }

    // Helper function to map status codes to their labels
    private function mapStatus($status)
    {
        if ($status === null) {
            return '';
        }

        switch ($status) {
            case 0:
                return '<span class="tag is-danger is-light">Rejected</span>';
            case 1:
                return '<span class="tag is-primary is-light">Approved</span>';
            case 2:
                return '<span class="tag is-warning is-light">Need Revision</span>';
            default:
                return '';
        }
    }

    // Tampilkan Edit Post page
    public function editPostPage($id)
    {
        // Find post by ID
        $post = Post::findOrFail($id);

        // Return edit-post view with the post data
        return view('users.edit-post', compact('post'));
    }

    // Update Post
    public function update(Request $request, $id)
    {
        // Validasi data yang diinput
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
        ]);

        // Cari post berdasarkan ID
        $post = Post::findOrFail($id);

        // Tambahkan slug secara otomatis
        $validated['slug'] = str()->slug($request->input('title'));

        // Update hanya field yang ada dalam $validated
        $post->update($validated);

        // Redirect ke halaman posts dengan pesan sukses
        return redirect('/users/posts')->with('success', 'Post updated successfully.');
    }


    // Hapus post
    public function destroy($id)
    {
        // Cari post berdasarkan ID
        $post = Post::findOrFail($id);

        // Hapus data
        $post->delete();

        // Redirect ke halaman posts dengan pesan sukses
        return redirect('/users/posts')->with('success', 'Post deleted successfully.');
    }
}
