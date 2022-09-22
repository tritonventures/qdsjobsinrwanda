<?php

namespace Database\Seeders;

use App\Models\Admin\Filters\ExperienceListing;
use Illuminate\Database\Seeder;

class ExperienceListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExperienceListing::create([
            "name" => "0-1 Years",
            "min" => "0",
            "max" => "1",
        ]);
        ExperienceListing::create([
            "name" => "1-3 Years",
            "min" => "1",
            "max" => "3",
        ]);
        ExperienceListing::create([
            "name" => "3-5 Years",
            "min" => "3",
            "max" => "5",
        ]);
        ExperienceListing::create([
            "name" => "5 - more Years",
            "min" => "5",
        ]);
    }
}
