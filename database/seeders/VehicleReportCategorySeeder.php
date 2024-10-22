<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class VehicleReportCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Quarterly Vehicle Forecast',
            'Monthly Vehicle Performance Report',
            'Quarterly Vehicle Performance Report',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'categorizable_type' => 'App\Models\VehicleReport'
            ]);
        }
    }
}
