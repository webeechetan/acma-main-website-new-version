<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class EventMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'National',
            'International',
            'ACOE',
            'Southern Region Events',
            'Eastern Region Events',
            'Northern Region Events',
            'Western Region Events', 
            'YBLF Events',
            'Cluster And Projects'
        ];

        foreach($categories as $category){
            Category::create([
                'name' => $category,
                'categorizable_type' => 'App\Models\EventMaster'
            ]);
        }
    }
}
