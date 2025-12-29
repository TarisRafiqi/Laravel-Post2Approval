<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;

class MyProfileController extends Controller
{
    public function index() {
         $user = Auth::user();

        return view('users.my-profile', compact('user'));
    }

    
}