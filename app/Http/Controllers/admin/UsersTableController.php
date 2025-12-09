<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersTableController extends Controller
{
    // Tampilkan Users page
    public function index()
    {
        $users = User::all();

        // Map role values to their respective labels
        $users = $users->map(function ($user) {
            $user->role = $this->mapRole($user->role);
            return $user;
        });

        $users = $users->map(function ($user) {
            $user->active = $this->mapActive($user->active);
            return $user;
        });

        return view('admin.users', ['users' => $users]);
    }

    private function mapRole($role)
    {
        if ($role === null) {
            return '';
        }

        switch ($role) {
            case 'admin':
                return '<span class="tag is-danger">Admin</span>';
            case 'approver':
                return '<span class="tag is-info">Approver</span>';
            case 'user':
                return '<span class="tag is-success">User</span>';
            default:
                return '';
        }
    }

    private function mapActive($active)
    {
        if ($active === null) {
            return '';
        }

        switch ($active) {
            case '0':
                return '<span class="tag is-dark">Not Active</span>';
            case '1':
                return '<span class="tag is-warning">Active</span>';
            default:
                return '';
        }
    }
}
