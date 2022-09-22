<?php

namespace Database\Factories\Shared;

use App\Models\Shared\Internship;
use Illuminate\Database\Eloquent\Factories\Factory;

class InternshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Internship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'description' => $this->faker->text,
        'company_id' => $this->faker->word,
        'location' => $this->faker->word,
        'is_employed' => $this->faker->word,
        'is_active' => $this->faker->word,
        'created_by' => $this->faker->word,
        'nationality_id' => $this->faker->word,
        'proffession_id' => $this->faker->word,
        'experience_id' => $this->faker->word,
        'education_id' => $this->faker->word,
        'salary_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
