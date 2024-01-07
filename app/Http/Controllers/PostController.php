<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller {

    public function index() {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            'title' => 'All Posts' . $title,
            'active' => 'posts',
            'posts' =>  Post::with(['author', 'category'])->latest()->filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        $data = Post::where('category_id', $post->category_id)
        ->whereNotIn('id', [$post->id])
        // ->orWhere('user_id', $post->user_id)
        // ->whereNotIn('id', [$post->id])
        ->take(5)->get();

        return view('post', [
            'title' => 'Single Post',
            'active' => 'posts',
            'post' => $post,
            'categories' => $data
        ]);
    }
}
