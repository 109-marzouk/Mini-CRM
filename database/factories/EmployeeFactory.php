<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'    => $this->faker->firstName(),
            'last_name'     => $this->faker->lastName(),
            'company_id'    => rand(1, 5),
            'email'         => $this->faker->unique()->safeEmail(),
            'phone'         => $this->faker->unique()->phoneNumber(),
            'linkedin_url'  => $this->faker->url()
        ];
    }
}
