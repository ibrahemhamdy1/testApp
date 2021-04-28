<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['php', 'js'] as $categoryName) {
            Category::create(
                ['name' => $categoryName]
            );
        }
    }
}
