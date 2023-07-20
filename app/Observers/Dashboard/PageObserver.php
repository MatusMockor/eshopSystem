<?php

namespace App\Observers\Dashboard;

use App\Models\SubPage;

class PageObserver
{
    public function creating(SubPage $page) : void
    {
        $page->slug = \Str::slug($page->name);
    }

    public function updating(SubPage $page) : void
    {
        $page->slug = \Str::slug($page->name);
    }
}
