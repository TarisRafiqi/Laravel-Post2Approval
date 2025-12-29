<?php

use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\users\PostsTableController as UsersPostsTableController;
use App\Http\Controllers\users\PostController as UsersPostController;
use App\Http\Controllers\admin\PostsTableController as AdminPostsTableController;
use App\Http\Controllers\admin\PostController as AdminPostController;
use App\Http\Controllers\admin\UsersTableController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\approver\PostsTableController as ApproverPostsTableController;
use App\Http\Controllers\approver\PostController as ApproverPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\users\MyProfileController;
use Illuminate\Http\Request;

// Home Page
Route::get('/', function () {
    return view('home');
});
// Login Page
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');;

// Register Page
Route::get('/register', [RegisterController::class, 'showRegisterForm']);
Route::post('/register', [RegisterController::class, 'registerUser']);



// Role Admin
Route::middleware(['role:admin'])->group(function () {
    // Posts Page
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    Route::get('/admin/posts', [AdminPostsTableController::class, 'index']);
    Route::get('/admin/view/pdf', [AdminPostsTableController::class, 'view_df']);
    Route::get('/admin/download/pdf', [AdminPostsTableController::class, 'download_df']);
    Route::delete('/admin/posts/{id}', [AdminPostsTableController::class, 'destroy']);

    // Users Tabel Page
    Route::get('/admin/users',  [UsersTableController::class, 'index']);

    // User Page
    Route::get('/admin/user/{id}', [UserController::class, 'userPage']);
    Route::patch('/admin/user/{id}', [UserController::class, 'updateUserInfo']);

    // Post Page
    // Route::get('/admin/post/{slug}', [AdminPostController::class, 'showPost']);
    Route::get('/admin/post/{slug}', [AdminPostController::class, 'showPost'])->name('admin.post.show');
    Route::put('/admin/post/{slug}', [AdminPostController::class, 'updatePost'])->name('admin.post.update');
});

// Role Approver
Route::middleware(['role:approver'])->group(function () {
    // Posts Page
    Route::get('/approver/posts', [ApproverPostsTableController::class, 'index']);
    Route::delete('/approver/posts/{id}', [ApproverPostsTableController::class, 'destroy']);
    Route::patch('/approver/posts/{id}', [ApproverPostsTableController::class, 'update']);

    // Post Page
    Route::get('/approver/post/{slug}', [ApproverPostController::class, 'showPost'])->name('approver.post.show');
    Route::put('/approver/post/{slug}', [ApproverPostController::class, 'updatePost'])->name('approver.post.update');

    // My Profile
    Route::get('/approver/my-profile', function () {
        return view('approver.my-profile');
    });
});

// Role User
Route::middleware(['role:user'])->group(function () {
    // Posts Page
    Route::get('/users/posts', [UsersPostsTableController::class, 'index']);
    Route::get('/users/edit-post/{id}', [UsersPostsTableController::class, 'editPostPage']);
    Route::delete('/users/posts/{id}', [UsersPostsTableController::class, 'destroy']);
    Route::patch('/users/posts/{id}', [UsersPostsTableController::class, 'update']);

    // Input-Post Page
    Route::get('/users/posts/input-post', [UsersPostController::class, 'showInputPostForm']);
    Route::post('/users/posts/store', [UsersPostController::class, 'store']);

    // Post Page
    Route::get('/users/posts/{post:slug}', [UsersPostController::class, 'showPost']);

    // My Profile
    Route::get('/users/my-profile', [MyProfileController::class, 'index']);
});
