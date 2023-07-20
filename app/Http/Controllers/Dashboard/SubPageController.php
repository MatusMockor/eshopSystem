<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubPageRequest;
use App\Models\SubPage;
use App\Repositories\Interface\SubPageRepositoryContract;
use Illuminate\Http\RedirectResponse;

class SubPageController extends Controller
{
    public function __construct(protected SubPageRepositoryContract $subPageRepository)
    {
    }

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

    public function store(StoreSubPageRequest $request) : RedirectResponse
    {
        $this->subPageRepository->create($request->validated());

        return to_route('dashboard')->with('success', 'Sub-Page was successfully created');
    }
}
