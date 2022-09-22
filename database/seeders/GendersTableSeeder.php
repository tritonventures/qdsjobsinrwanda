<?php

namespace Database\Seeders;

use App\Models\Admin\Filters\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::factory()->create([
            "name" => "Male"
        ]);
        Gender::factory()->create([
            "name" => "Female"
        ]);
    }
}
