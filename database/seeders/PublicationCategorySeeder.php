<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class PublicationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Auto-News',
            'IMPACT',
            'Annual-Report',
            'Reaserch-Studies',
            'Saksham-Samvad'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'categorizable_type' => 'App\Models\Publication'
            ]);
        }

    }
}
