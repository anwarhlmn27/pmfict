<?php

namespace Database\Factories;

use App\Models\HeroSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HeroSlider>
 */
class HeroSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'badge_text' => 'SISTEM PENJAMINAN MUTU INTERNAL (SPMI)',
            'title' => fake()->sentence(6),
            'description' => fake()->paragraph(),
            'image_path' => 'img/foto/Meet1.jpeg',
            'primary_btn_text' => 'Siklus PPEPP',
            'primary_btn_url' => '#ppepp',
            'secondary_btn_text' => 'Unduh Dokumen Mutu',
            'secondary_btn_url' => '#dokumen-standar-mutu',
            'sort_order' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
