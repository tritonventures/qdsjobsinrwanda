<?php

namespace Database\Factories\Admin;

use App\Models\Admin\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'names' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'age' => $this->faker->numberBetween(1, 30),
            'dob' => $this->faker->date('Y-m-d'),
            'user_type' => "candidate",
            'skills' => $this->faker->text(20),
            'is_employed' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(),
            'gender_id' => $this->faker->numberBetween(1, 2),
            'nationality_id' => $this->faker->numberBetween(1, 2),
            'proffession_id' => $this->faker->numberBetween(1, 10),
            'salary_id' => $this->faker->numberBetween(1, 5),
            'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
            'password' => $this->faker->password(),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
