<?php

namespace Database\Seeders;

use App\Models\Admin\Filters\Nationality;
use Illuminate\Database\Seeder;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nationality::factory()->create([
            "name" => "Rwandan"
        ]);
        Nationality::factory()->create([
            "name" => "Non-rwandan"
        ]);
    }
}
