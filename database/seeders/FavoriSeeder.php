<?php

namespace Database\Seeders;

use App\Models\Oeuvre;
use App\Models\Visiteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visiteurs = Visiteur::all();
        
        // Populate the pivot table
        Oeuvre::all()->each(function ($oeuvre) use ($visiteurs) { 
            $maxId = count($visiteurs);
            $oeuvre->visiteursFav()->attach(
                $visiteurs->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });
    }
}
