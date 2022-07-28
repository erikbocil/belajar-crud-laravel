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
            'title' => str_replace('.', '', $this->faker->text(20)),
            'author' => $this->faker->name(),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'description' => $this->faker->text(50),
        ];
    }
}
