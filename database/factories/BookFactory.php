<?php

namespace Database\Factories;

use App\Models\Book;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
        $title = str_replace('.', '', $this->faker->text(20));
        return [
            'title' => $title,
            'author' => $this->faker->name(),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'description' => $this->faker->text(50),
            'slug' => SlugService::createSlug(Book::class, 'slug', $title),
        ];
    }
}
