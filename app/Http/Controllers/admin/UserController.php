<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   // Tampilkan User page
   public function userPage($id)
   {
      // Find post by ID
      $user = User::findOrFail($id);
      
      // Return user page view with the user data
      return view('admin.user', compact('user'));
   }

   public function updateUserInfo(Request $request, $id)
   {
      // Validasi data yang diinput
      $validated = $request->validate([
         'name' => 'sometimes|required',
         'role' => 'sometimes|required',
         'active' => 'sometimes|required',
     ]);

      // Cari user berdasarkan ID
      $user = User::findOrFail($id);

      // Update hanya field yang ada dalam $validated
      $user->update($validated);

      // Redirect kembali ke halaman sebelumnya dengan pesan sukses
      return redirect()->back()->with('success', 'User updated successfully.');
   }
}
