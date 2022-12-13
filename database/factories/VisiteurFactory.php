<?php

namespace Database\Factories;

use App\Models\User;
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
        $idsUtilisateurs = User::all()->pluck('id')->toArray();
        return [
            'nom'=>$this->faker->lastName,
            'prenom'=>$this->faker->firstName,
            'user_id' => array_rand($idsUtilisateurs, 1) + 1,
        ];
    }
}
