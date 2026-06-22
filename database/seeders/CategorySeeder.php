<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * The store only ever has two categories. Products are linked directly to
     * one of these (subcategories were removed). Rename them or replace the
     * placeholder images from the admin Category panel.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Men',
                'sub_title' => 'Shop the men collection',
                // Relative to storage/app/public (served via asset('storage/'.$image)).
                'image' => 'categories_image/men.jpg',
            ],
            [
                'title' => 'Women',
                'sub_title' => 'Shop the women collection',
                'image' => 'categories_image/women.jpg',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['title' => $category['title']],
                $category
            );
        }
    }
}
