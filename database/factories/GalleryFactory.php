<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'subtitle' => fake()->sentence(5),
            'badge' => fake()->randomElement(['SPMI', 'GKM', 'CPL', 'RTM', 'AMI']),
            'image_path' => 'img/foto/Meet1.jpeg',
            'sort_order' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
