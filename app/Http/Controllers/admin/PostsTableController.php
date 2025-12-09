<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            return $post;
        });

        return view('admin.posts', ['posts' => $posts]);
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
                return '<span class="tag is-success is-light">Approved</span>';
            case 2:
                return '<span class="tag is-warning is-light">Need Revision</span>';
            default:
                return '';
        }
    }

    // Hapus post
    public function destroy($id)
    {
        // Cari post berdasarkan ID
        $post = Post::findOrFail($id);

        // Hapus data
        $post->delete();

        // Redirect ke halaman posts dengan pesan sukses
        return redirect('/admin/posts')->with('success', 'Post deleted successfully.');
    }
}
