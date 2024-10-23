<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CirculerCategorySeeder::class,
            PublicationCategorySeeder::class,
            GalleryCategorySeeder::class,
<<<<<<< HEAD
            EventMasterSeeder::class,
            GovtPolicySeeder::class,
=======
            VehicleReportCategorySeeder::class,
>>>>>>> 9310f61bcc63aa84cf9f135ff43e798166556155
        ]);
    }
}
