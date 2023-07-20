<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SubPage;

class SubPageController extends Controller
{
    public function index()
    {
        return view('dashboard.subPage.index', [
                'pages' => SubPage::all(),
            ]
        );
    }

    public function create()
    {
        return view('dashboard.subPage.create');
    }
}
