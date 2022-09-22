<?php

namespace Database\Seeders;

use Database\Factories\CompanyFactory;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyFactory::new()->create([
            'name' => "Paypack",
        ]);
    }
}
