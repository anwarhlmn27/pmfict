<?php

namespace Database\Factories;

use App\Models\OrganizationStructure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrganizationStructure>
 */
class OrganizationStructureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'position_title' => fake()->jobTitle(),
            'person_name' => fake()->name(),
            'role_description' => fake()->sentence(6),
            'icon_class' => fake()->randomElement([
                'fas fa-user-tie',
                'fas fa-award',
                'fas fa-clipboard-check',
                'fas fa-laptop-code',
                'fas fa-users-cog',
            ]),
            'sort_order' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
