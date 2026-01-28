<?php

// database/seeders/CategorySeeder.php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'AI・機械学習', 'slug' => 'ai-ml'],
            ['name' => 'Webマーケティング', 'slug' => 'marketing'],
            ['name' => 'ITインフラ', 'slug' => 'infrastructure'],
            ['name' => 'プログラミング', 'slug' => 'programming'],
            ['name' => 'ビジネス用語', 'slug' => 'business'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
