<?php

namespace Database\Seeders;

use App\Models\Admin\Filters\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::factory()->create([
            "name" => "English"
        ]);
        Language::factory()->create([
            "name" => "French"
        ]);
        Language::factory()->create([
            "name" => "Kinyarwanda"
        ]);
    }
}
