<?php

namespace Database\Seeders;

use App\Models\Visiteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visiteur::factory(20)->create();
    }

    public static function createVisiteur($user, $prenom) {
        $visiteur = new Visiteur();
        $visiteur['nom'] = $user['name'];
        $visiteur['prenom'] = $prenom;
        $visiteur['user_id'] = $user->id;
        $visiteur->save();
    }
}
