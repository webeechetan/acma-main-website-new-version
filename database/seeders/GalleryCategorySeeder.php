<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'International',
            'Domestic',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'categorizable_type' => 'App\Models\Gallery'
            ]);
        }
    }
}
