<?php

namespace Database\Seeders;

use App\Models\Admin\Filters\Salary;
use Illuminate\Database\Seeder;

class SalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salary::factory()->create([
            "name" => "50,000 - 100,000",
            "min" => "50000",
            "max" => "100000"
        ]);
        Salary::factory()->create([
            "name" => "100,000 - 200,000",
            "min" => "100000",
            "max" => "200000"
        ]);
        Salary::factory()->create([
            "name" => "200,000 - 300,000",
            "min" => "200000",
            "max" => "300000"
        ]);
        Salary::factory()->create([
            "name" => "300,000 - 500,000",
            "min" => "300000",
            "max" => "500000"
        ]);
        Salary::factory()->create([
            "name" => "500,000 - 700,000",
            "min" => "500000",
            "max" => "700000"
        ]);
        Salary::factory()->create([
            "name" => "700,000 - 1,000,000",
            "min" => "700000",
            "max" => "1000000"
        ]);
        Salary::factory()->create([
            "name" => "1,000,000 - 2,000,000",
            "min" => "1000000",
            "max" => "2000000"
        ]);
        Salary::factory()->create([
            "name" => "2,000,000 - 3,500,000",
            "min" => "2000000",
            "max" => "3500000"
        ]);
        Salary::factory()->create([
            "name" => "3,500,000 - 5,000,000",
            "min" => "3500000",
            "max" => "5000000"
        ]);
        Salary::factory()->create([
            "name" => "5,000,000 - 10,000,000",
            "min" => "5000000",
            "max" => "10000000"
        ]);
    }
}