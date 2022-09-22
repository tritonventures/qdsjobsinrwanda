<?php

namespace Database\Seeders;

use App\Models\Admin\Filters\ExperienceListing;
use Database\Seeders\Shared\CompaniesTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EducationTableSeeder::class,
            GendersTableSeeder::class,
            LanguagesTableSeeder::class,
            NationalitiesTableSeeder::class,
            ProffessionsTableSeeder::class,
            SalariesTableSeeder::class,
            UserTableSeeder::class,
            ExperienceListingTableSeeder::class,
            ExperiencesTableSeeder::class,
        ]);
    }
}
