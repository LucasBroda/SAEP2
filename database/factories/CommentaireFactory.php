<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $notes = [1,2,3,4,5];

        $createAt = $this->faker->dateTimeInInterval(
            $startDate = '-6 months',
            $interval = '+ 180 days',
        );
        return [
            'titre'=>$this->faker->title,
            'corp'=>$this->faker->name,
            'note'=>$this->faker->randomNumber($notes),
            'dateUpdate'=>$createAt
        ];
    }
}
