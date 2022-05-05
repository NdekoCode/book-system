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
            'name' => $this->faker->words(rand(1, 6), true),
            'ISBN' => $this->faker->numberBetween(2147483647, 5147483647),
            'category' => $this->faker->numberBetween(1, 20),
            'price' => $this->faker->numberBetween(2, 25),
            'description' => $this->faker->sentence(10, 15),
            'image_desc' => "https://picsum.photos/id/" . rand(3, 300) . "/400/500",
            'author' => $this->faker->numberBetween(1, 15)

        ];
    }
}
