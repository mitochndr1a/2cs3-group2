<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        static $categories = [
            ['Fiction',          'Imaginative storytelling and narratives'],
            ['Non-Fiction',      'Factual and real-world topics'],
            ['Science',          'Natural sciences, physics, biology, chemistry'],
            ['Technology',       'Computing, software, and engineering'],
            ['History',          'Historical accounts and analysis'],
            ['Philosophy',       'Philosophical thought and ethics'],
            ['Self-Help',        'Personal development and motivation'],
            ['Biography',        'Life stories of real people'],
            ['Mystery',          'Crime fiction and thrillers'],
            ['Romance',          'Love stories and relationships'],
            ['Horror',           'Fear-inducing stories and gothic fiction'],
            ['Science Fiction',  'Futuristic and speculative fiction'],
            ['Fantasy',          'Magic, mythical creatures, and epic worlds'],
            ['Classic',          'Timeless works of literature'],
            ['Poetry',           'Verse and lyrical writing'],
        ];

        static $index = 0;
        $cat = $categories[$index % count($categories)];
        $index++;

        return [
            'name'        => $cat[0],
            'description' => $cat[1],
        ];
    }
}