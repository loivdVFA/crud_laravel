<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 'upload/1741791799-error_aws.png',
            'title'=> fake()->title(),
            'description' => fake()->paragraph(),
            'category_id' => rand(1,10)
        ];
    }
}
