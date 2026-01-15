<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display list of categories for users
     */
    public function index()
    {
        $categories = Category::where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('user.categories.index', compact('categories'));
    }

    /**
     * Display a single category
     */
    public function show(Category $category)
    {
        // Optional safety check
        if ($category->status !== 'active') {
            abort(404);
        }

        return view('user.categories.show', compact('category'));
    }
}
