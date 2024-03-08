<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SubPage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Setting::factory()->create();
        User::factory()->create();

        $category = Category::factory(10)->create();
        Product::factory(20)
            ->recycle($category)
            ->create();
        Product::factory(20)
            ->recycle($category)
            ->soldOut()->create();

        SubPage::factory(5)->create();
    }
}
