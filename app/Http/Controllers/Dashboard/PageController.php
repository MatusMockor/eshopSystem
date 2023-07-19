<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        return view('dashboard.page.index', [
                'pages' => Page::all(),
            ]
        );
    }

    public function create()
    {
        return view('dashboard.page.create');
    }
}
