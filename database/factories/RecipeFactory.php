<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(3),
            'steps' => $this->faker->paragraphs(2, true),
            'user_id' => 1,
            'type_tags' => 'cake, dessert, something',
            'ingredient_tags' => 'flour, eggs, something, everything'
        ];
    }
}
