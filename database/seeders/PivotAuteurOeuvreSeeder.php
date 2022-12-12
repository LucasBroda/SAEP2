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
        Auteur::all()->each(function ($auteur) use ($oeuvres) { 
            $auteur->oeuvres()->attach(
                $oeuvres->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });
    }
}
