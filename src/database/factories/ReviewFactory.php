<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
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
            'rating' => $this->faker->numberBetween(1, 5),
            'review_text' => $this->faker->realText(),
            'created_at' => $this->faker->dateTimeBetween('-20 years'),
        ];
    }
}
