<?php

namespace Database\Factories;

use App\Models\QualityDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QualityDocument>
 */
class QualityDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = fake()->randomElement(['kebijakan', 'standar', 'manual', 'formulir']);
        $prefix = match ($category) {
            'kebijakan' => 'KBJ-SPMI',
            'standar' => 'STD-SPMI',
            'manual' => 'MNL-PPEPP',
            default => 'FRM-SPMI',
        };

        return [
            'category' => $category,
            'code' => $prefix.'-'.fake()->unique()->numerify('##'),
            'title' => fake()->sentence(6),
            'edition' => 'Versi 2026',
            'file_path' => '#',
            'file_type' => 'PDF',
            'file_size' => fake()->numberBetween(1, 3).'.'.fake()->numberBetween(1, 9).' MB',
            'download_count' => 0,
            'sort_order' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
