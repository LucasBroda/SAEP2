<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visiteur>
 */
class VisiteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->lastName,
            'prenom'=>$this->faker->firstName,
            'avatar'=>$this->faker->imageUrl
        ];
    }
}