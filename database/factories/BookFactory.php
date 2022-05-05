<?php

namespace Database\Factories;

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
            'name' => $this->faker->sentence(rand(1, 6)),
            'ISBN' => $this->faker->numberBetween(2147483647, 5147483647),
            'price' => $this->faker->numberBetween(2, 25),
        ];
    }
}
