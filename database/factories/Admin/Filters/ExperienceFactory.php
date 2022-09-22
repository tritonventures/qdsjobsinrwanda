<?php

namespace Database\Factories\Admin\Filters;

use App\Models\Admin\Filters\Experience;
use App\Models\Admin\Filters\ExperienceListing;
use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => User::inRandomOrder()->first(),
            'company' => $this->faker->company(),
            'position' => $this->faker->jobTitle(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            "listing_id" => ExperienceListing::inRandomOrder()->first(),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date()
        ];
    }
}
