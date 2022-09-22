<?php

namespace Database\Seeders;

use App\Models\Admin\Filters\Education;
use Illuminate\Database\Seeder;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::factory()->create([
            "name" => "Secondary School Certificate"
        ]);
        Education::factory()->create([
            "name" => "A1 Diploma"
        ]);
        Education::factory()->create([
            "name" => "Bachelors Degree"
        ]);
        Education::factory()->create([
            "name" => "Masters"
        ]);
        Education::factory()->create([
            "name" => "PHD"
        ]);
    }
}
