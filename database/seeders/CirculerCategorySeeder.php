<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CirculerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'all',
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
            \App\Models\CirculerCategory::create([
                'name' => $category
            ]);
        }
        
    }
}
