<?php

namespace Database\Factories\Shared;

use App\Models\Shared\Tender;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tender::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'title_slug' => $this->faker->slug(),
            'company' => $this->faker->words(2),
            'company_slug' => $this->faker->slug(),
            'description' => $this->faker->realTextBetween(500, 1000),
            'location' => $this->faker->city(),
            'website_link' => $this->faker->word,
            'deadline' => $this->faker->date,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
