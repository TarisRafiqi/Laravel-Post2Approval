<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Check credentials using Auth attempt
        $credentials = [
            'username' => $request->username, 
            'password' => $request->password, 
            'active' => 1
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect('/admin/posts');
            } elseif ($user->role === 'user') {
                return redirect('/users/posts');
            } elseif ($user->role === 'approver') {
                return redirect('/approver/posts');
            }

            // Handle unexpected roles (optional)
            return back()->withErrors(['login' => 'Invalid role detected.']);
        }

        // Check if account is inactive
        $inactiveUser = Auth::attempt(['username' => $request->username, 'password' => $request->password, 'active' => 0]);

        if ($inactiveUser) {
            return back()->withErrors(['login' => 'Your account has not been activated by admin.']);
        }

        // If login failed
        return back()->withErrors(['login' => 'Invalid username or password.']);
    }
}
