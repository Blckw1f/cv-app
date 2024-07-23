<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */

class PersonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'second_name' => fake()->lastName(),
            'third_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
        ];
    }
}
