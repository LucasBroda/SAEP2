<?php

namespace Database\Seeders;

use App\Models\Auteur;
use App\Models\Oeuvre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PivotAuteurOeuvreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oeuvres = Oeuvre::all();

        // Populate the pivot table
        $faker = \Faker\Factory::create('fr_FR');
        $auteurs = Auteur::all()->pluck('id');
        foreach ($oeuvres as $oeuvre){
            $nb = $faker->numberBetween(1,3);
            $oeuvre->auteurs()->attach(
                $faker->randomElements($auteurs,$nb)
            );
        }
    }
}
