<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubPageRequest;
use App\Models\SubPage;
use Illuminate\Http\RedirectResponse;

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

    public function store(StoreSubPageRequest $request): RedirectResponse
    {
        SubPage::create($request->validated());

        return to_route('dashboard')->with('success', 'Sub-Page was successfully created');
    }
}
