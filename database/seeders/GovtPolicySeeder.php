<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class GovtPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Centeral Govt Policy',
            'State Policy / EV Policy',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'categorizable_type' => 'App\Models\GovtPolicy'
            ]);
        }
    }
}
