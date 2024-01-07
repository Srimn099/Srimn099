<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardCategoryController;

Route::redirect('/', '/posts');
// Route::get('/', function() {
//     return view('templates/dashboard2', [
//         'title' => 'Dashboard',
//     ]);
// });
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Categories',
        'categories' => Category::all(),
    ]);
});

Route::get('/signin', [AuthController::class, 'signin'])->name('login')->middleware('guest');
Route::post('/signin', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'signup'])->middleware('guest');
Route::post('/signup', [AuthController::class, 'register']);
Route::post('/signout', [AuthController::class, 'logout']);

Route::get('/dashboard/posts/createSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard', [DashboardPostController::class, 'index'])->middleware('auth');
Route::delete('/dashboard/posts', [DashboardPostController::class, 'destroy'])->middleware('auth');

Route::resource('/dashboard/users', DashboardUserController::class)->middleware('auth');
Route::get('/dashboard/users/{user}/key', [DashboardUserController::class, 'key'])->middleware('auth');
Route::put('/dashboard/users/{user}/key', [DashboardUserController::class, 'keyupdate'])->middleware('auth');
Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('auth');