<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate();
        return view('dashboard.category.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(StoreCategoryRequest $request) : RedirectResponse
    {
        Category::create($request->validated());

        return to_route('dashboard');
    }

    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(StoreCategoryRequest $request, Category $category) : RedirectResponse
    {
        $category->update($request->validated());

        return to_route('dashboard');
    }
}
