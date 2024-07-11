<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electricity Transmission Project',
            'Road Maintenance Project',
            'Cross-Cutting Activities',
            'Project Areas',
            'Latest Project Updates',
        ];

        $payload = [];
        foreach ($categories as $category) {
            $payload[] = [
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        ProjectCategory::insert($payload);
    }
}
