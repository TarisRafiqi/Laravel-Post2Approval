<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
   public function showRegisterForm()
   {
      return view('register');
   }

   public function registerUser(Request $request)
   {
      // Validate input
      $request->validate([
         'name' => 'required',
         'username' => 'required|unique:users,username',
         'password' => 'required',
      ]);

      // Simpan data ke database
      User::create([
         'name' => $request->name,
         'username' => $request->username,
         'password' => Hash::make($request->password),
      ]);

      return redirect('/login')->with('success', 'Registration successful! Please login.');
   }
}
