<?php

namespace Database\Seeders;

use App\Models\Admin\Filters\Proffession;
use Illuminate\Database\Seeder;

class ProffessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proffession::factory()->create([
            "name" => "sales"
        ]);
        Proffession::factory()->create([
            "name" => "marketing"
        ]);
        Proffession::factory()->create([
            "name" => "accounting"
        ]);
        Proffession::factory()->create([
            "name" => "law"
        ]);
        Proffession::factory()->create([
            "name" => "engineering"
        ]);
        Proffession::factory()->create([
            "name" => "environment"
        ]);
        Proffession::factory()->create([
            "name" => "media"
        ]);
        Proffession::factory()->create([
            "name" => "hospitality"
        ]);
        Proffession::factory()->create([
            "name" => "architecture"
        ]);
        Proffession::factory()->create([
            "name" => "banking"
        ]);
        Proffession::factory()->create([
            "name" => "public health"
        ]);
        Proffession::factory()->create([
            "name" => "logistics"
        ]);
        Proffession::factory()->create([
            "name" => "procurement"
        ]);
        Proffession::factory()->create([
            "name" => "nutrition"
        ]);
        Proffession::factory()->create([
            "name" => "agriculture"
        ]);
        Proffession::factory()->create([
            "name" => "pharmacy"
        ]);
        Proffession::factory()->create([
            "name" => "laboratory"
        ]);
        Proffession::factory()->create([
            "name" => "tourism"
        ]);
        Proffession::factory()->create([
            "name" => "public relations"
        ]);
        Proffession::factory()->create([
            "name" => "ict"
        ]);
        Proffession::factory()->create([
            "name" => "project managment"
        ]);
        Proffession::factory()->create([
            "name" => "finance"
        ]);
        Proffession::factory()->create([
            "name" => "education"
        ]);
        Proffession::factory()->create([
            "name" => "human resource"
        ]);
    }
}
