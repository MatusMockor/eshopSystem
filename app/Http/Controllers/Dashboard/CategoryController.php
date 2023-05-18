<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::simplePaginate();
        return view('dashboard.category.index', [
            'categories' => $categories
        ]);
    }
}
