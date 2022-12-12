<?php

namespace Database\Factories;

use App\Models\Oeuvre;
use App\Models\Visiteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListeFavorie>
 */
class ListeFavorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id_oeuvre = Oeuvre::all()->pluck('id');
        $id_visiteur = Visiteur::all()->pluck('id');

        return [
            'id_oeuvre'=>$this->faker->randomElement($id_oeuvre),
            'id_visiteur'=>$this->faker->randomElement($id_visiteur)
        ];
    }
}
