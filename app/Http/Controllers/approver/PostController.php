<?php

namespace App\Http\Controllers\approver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function showPost($slug)
    {
        // Mengambil post
        $post = Post::with(['approver1', 'approver2'])->where('slug', $slug)->firstOrFail();

        // Map status_2 ke label
        $statusLabels = [
            0 => 'Rejected',
            1 => 'Approved',
            2 => 'Need Revision',
        ];

        $post->status_2 = $statusLabels[$post->status_2] ?? '';
        
        return view('approver.post', compact('post'));
    }

    public function updatePost(Request $request, $slug)
    {
        // Mencari post berdasarkan slug
        $post = Post::where('slug', $slug)->firstOrFail();

        // Update data post dengan nilai yang dikirimkan dari form
        $post->update([
            'status_1' => $request->status_1,
        ]);

        // Redirect atau beri feedback kepada user
        return redirect()->route('approver.post.show', $slug)->with('success', 'Post updated successfully.');
    }

}
