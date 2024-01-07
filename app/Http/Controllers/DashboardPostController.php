<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller {

    public function index() {
        return view('dashboard/posts/index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'posts' =>  Post::where('user_id', auth()->user()->id)
                            ->with(['author', 'category'])->latest()
                            ->filter(request(['search', 'category', 'author']))
                            ->paginate(9)->withQueryString()
        ]);
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function create() {
        return view('dashboard/posts/create', [
            'title' => 'Create',
            'categories' => Category::all(),
            'active' => 'posts'
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'content' => 'required'
        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('post-images');
        }

        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = Str::limit(strip_tags($request->content), 160);

        Post::create($data);
        return redirect('dashboard/posts')->with('success', 'New post added successfully!');
    }

    public function show(Post $post) {
        return view('dashboard/posts/detail', [
            'title' => 'Single Post',
            'active' => 'dashboard',
            'post' => $post
        ]);
    }

    public function edit(Post $post) {
        return view('dashboard/posts/edit', [
            'title' => 'Edit',
            'active' => 'posts',
            'categories' => Category::all(),
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post) {
        $rules = [
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'content' => 'required'
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('post-images');
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->content, 160));

        Post::where('id', $post->id)->update($validated);
        return redirect('dashboard/posts')->with('success', 'Post changed successfully!');
    }

    public function destroy(Post $post) {
        // return $post;
        if($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('dashboard/posts')->with('success', 'Post has been deleted!');
    }
}
