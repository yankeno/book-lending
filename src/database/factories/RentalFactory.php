<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'book_id' => $this->faker->numberBetween(1, 100),
            'checkout_date' => $this->faker->dateTimeBetween('-20 years')->format('Y-m-d'),
            'return_date' => $this->faker->dateTimeBetween('-20 years')->format('Y-m-d'),
            'is_returned' => $this->faker->numberBetween(0, 1),
            'created_at' => $this->faker->dateTimeBetween('-20 years'),
        ];
    }
}
