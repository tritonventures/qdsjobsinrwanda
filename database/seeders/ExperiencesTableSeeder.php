<?php

namespace Database\Seeders;

use App\Models\Admin\Filters\Experience;
use App\Models\Admin\User;
use Illuminate\Database\Seeder;

class ExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience::factory()->count(6)->create();
    }
}
