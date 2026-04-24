<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'          => $this->faker->sentence(rand(2, 6), false),
            'isbn'           => $this->faker->unique()->isbn13(),
            'author_id'      => Author::inRandomOrder()->first()?->id ?? Author::factory(),
            'category_id'    => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'published_year' => $this->faker->numberBetween(1800, 2024),
            'description'    => $this->faker->paragraph(3),
            'copies'         => $this->faker->numberBetween(1, 20),
        ];
    }
}