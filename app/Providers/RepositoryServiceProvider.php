<?php

namespace App\Providers;

use App\Repositories\Implementation\CategoryRepository;
use App\Repositories\Interface\CategoryRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() : void
    {
        $contracts = [
            CategoryRepositoryContract::class => CategoryRepository::class,
        ];

        foreach ($contracts as $contract => $implementation) {
            $this->app->bind($contract, $implementation);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot() : void
    {
        //
    }
}
