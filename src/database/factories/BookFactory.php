<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'publisher_id' => $this->faker->numberBetween(1, 3),
            'title' => $this->faker->word(),
            'isbn_13' => Str::random(13),
            'image' => 'sample' . $this->faker->numberBetween(1, 3) . '.jpg',
            'published_date' => $this->faker->dateTimeBetween('-20 years')->format('Y-m-d'),
            'created_at' => $this->faker->dateTimeBetween('-20 years'),
        ];
    }
}
