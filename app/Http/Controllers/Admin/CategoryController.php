<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort_order')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->status ?? 'active',
            'remark'     => $request->remark,
            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->status ?? 'active',
            'remark'     => $request->remark,
            'updated_by' => auth()->id(),
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted successfully');
    }
}
