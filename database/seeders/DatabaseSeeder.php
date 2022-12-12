<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Commentaire;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuteurSeeder::class);
        $this->call(OeuvreSeeder::class);
        $this->call(CommentaireSeeder::class);
        $this->call(VisiteurSeeder::class);
        $this->call(UtilisateurSeeder::class);
        $this->call(FavoriSeeder::class);
        $this->call(PivotAuteurOeuvreSeeder::class);
    }
}
