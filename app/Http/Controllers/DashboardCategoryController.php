<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoryController extends Controller {
    public function index() {
        $this->authorize('admin');
        return view('dashboard/categories/index', [
            'title' => 'Categories',
            'categories' => Category::all()
        ]);
    }

    public function create() {
        return view('dashboard/categories/create', [
            'title' => 'New Category'
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
            // 'slug' => 'required|unique:categories'
        ]);

        $validated['slug'] = SlugService::createSlug(Category::class, 'slug', $request->name);

        Category::create($validated);
        return redirect('dashboard/categories')->with('success', 'New category added successfully!');
    }

    public function edit(Category $category) {
        return view('dashboard/categories/edit', [
            'title' => 'Category Edit',
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category) {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $validated['slug'] = SlugService::createSlug(Category::class, 'slug', $request->name);

        Category::where('id', $category->id)->update($validated);
        return redirect('dashboard/categories')->with('success', 'Category changed successfully!');
    }

    public function destroy(Category $category) {
        Category::destroy($category->id);
        return redirect('dashboard/categories')->with('success', 'Category has been deleted!');
    }
}
