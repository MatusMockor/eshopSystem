<?php

namespace App\Observers\Dashboard;

use App\Models\Page;

class PageObserver
{
    public function creating(Page $page) : void
    {
        $page->slug = \Str::slug($page->name);
    }

    public function updating(Page $page) : void
    {
        $page->slug = \Str::slug($page->name);
    }
}
