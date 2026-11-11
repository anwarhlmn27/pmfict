<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category_badge' => fake()->randomElement(['SPMI', 'LAMINFOKOM', 'RTM', 'AMI', 'GKM']),
            'excerpt' => fake()->sentence(14),
            'content' => fake()->paragraphs(2, true),
            'thumbnail' => 'img/foto/Meet1.jpeg',
            'published_at' => now(),
            'is_published' => true,
        ];
    }
}
