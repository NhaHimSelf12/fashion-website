<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        // Add auth check in middleware
    }

    public function index()
    {
        if (Auth::user()->role !== 'admin') return redirect('/');
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin') return redirect('/');
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') return redirect('/');
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = 'data:image/' . $image->extension() . ';base64,' . base64_encode(file_get_contents($image->path()));
        }

        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category created.');
    }

    public function edit(Category $category)
    {
        if (Auth::user()->role !== 'admin') return redirect('/');
        $categories = Category::all();
        return view('admin.categories.index', compact('categories', 'category'));
    }

    public function update(Request $request, Category $category)
    {
        if (Auth::user()->role !== 'admin') return redirect('/');
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = 'data:image/' . $image->extension() . ';base64,' . base64_encode(file_get_contents($image->path()));
            
            // Delete old image if exists and is not base64
            if ($category->image && !str_starts_with($category->image, 'data:') && file_exists(public_path($category->image))) {
                @unlink(public_path($category->image));
            }
        }

        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated.');
    }

    public function destroy(Category $category)
    {
        if (Auth::user()->role !== 'admin') return redirect('/');
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }
}
