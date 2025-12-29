<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $data = [
            'jumlah_users' => User::count(),
            'jumlah_writers' => User::where('role', 'user')->count(),
            'jumlah_approvers' => User::where('role', 'approver')->count(),
            'jumlah_posts' => Post::count(),
            'jumlah_status2_approve' => Post::where('status_2', 1)->count(),
            'jumlah_status2_needrevision' => Post::where('status_2', 2)->count(),
            'jumlah_status2_rejected' => Post::where('status_2', 0)->count(),
        ];

        return view('admin.dashboard', compact(['data']));
    }
}
