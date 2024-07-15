<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Published Articles',
            'Published Interviews',
            'Online Interviews'
        ];

        $payload = [];
        foreach ($categories as $category) {
            $payload[] = [
                'category_name' => $category,
                'slug' => Str::slug($category),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        ArticleCategory::insert($payload);
    }
}
