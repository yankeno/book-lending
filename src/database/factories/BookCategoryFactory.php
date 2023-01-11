<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookCategoryFactory extends Factory
{
    private static int $sequence = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => function () {
                return self::$sequence++;
            },
            'category_id' => $this->faker->numberBetween(1, 163),
            'created_at' => $this->faker->dateTimeBetween('-20 years'),
        ];
    }
}
