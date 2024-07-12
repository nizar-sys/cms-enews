<?php

namespace Database\Seeders;

use App\Models\DocumentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DocumentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentCategories = [
            'Main Agreements',
            'Publications & Resources',
            'Feasibility Studies Reports',
            'Board Meeting Minutes',
            'Annual Reports',
            'EIA Report',
            'Newsletter',
        ];

        $payloadDocumentCategories = [];

        foreach ($documentCategories as $documentCategory) {
            $payloadDocumentCategories[] = [
                'name' => $documentCategory,
                'slug' => Str::slug($documentCategory),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DocumentCategory::insert($payloadDocumentCategories);

    }
}
