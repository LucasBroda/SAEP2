<?php

namespace Database\Factories;

use App\Models\Oeuvre;
use App\Models\Visiteur;
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
        $notes = [0,1,2,3,4,5];
        $idsOeuvre = Oeuvre::all()->pluck('id')->toArray();
        $idsVisiteur = Visiteur::all()->pluck('id')->toArray();

        $createAt = $this->faker->dateTimeInInterval(
            $startDate = '-6 months',
            $interval = '+ 180 days',
        );
        return [
            'oeuvre_id' => array_rand($idsOeuvre, 1) + 1,
            'visiteur_id' => array_rand($idsVisiteur, 1) + 1,
            'titre'=>$this->faker->title,
            'corp'=>$this->faker->name,
            'note'=> array_rand($notes, 1) + 1,
            'dateUpdate'=>$createAt
        ];
    }
}
