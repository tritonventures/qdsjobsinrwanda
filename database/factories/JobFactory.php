<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Filters\Language;
use App\Models\Admin\Filters\Nationality;
use App\Models\Admin\Filters\Proffession;
use App\Models\Admin\Job;
use App\Models\Shared\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(25),
            'description' => $this->faker->realText(200),
            'company_id' => Company::inRandomOrder()->first(),
            'location' => $this->faker->city(),
            'nationality_id' => Nationality::inRandomOrder()->first(),
            'proffession_id' => Proffession::inRandomOrder()->first(),
            'language_id' => Job::sync(Language::inRandomOrder()->first(), false),
            'is_employed' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(),
            'experience_id' => $this->faker->word,
            'education_id' => $this->faker->word,
            'salary_id' => $this->faker->word,
            'created_by' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
