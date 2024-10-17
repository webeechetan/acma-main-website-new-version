<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CirculerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'All',
            'CMVR Regulations',
            'Eastern Region',
            'Executive Committee',
            'Government Policy Matters',
            'Knowledge Partner Reports/ Industry Statistics',
            'National Events',
            'Northern Region',
            'Overseas Events',
            'Southern Region',
            'Steering Committee',
            'Western Region'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'categorizable_type' => 'App\Models\Circuler'
            ]);
        }
        
    }
}
