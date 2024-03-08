<?php

namespace App\View\Composers\Dashboard;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view): void
    {
        $categories = Category::pluck('id', 'name')->map(fn ($categoryId, $categoryName) => [
            'id'   => $categoryId,
            'name' => $categoryName,
        ]);
        $view->with('categories', $categories);
    }
}
