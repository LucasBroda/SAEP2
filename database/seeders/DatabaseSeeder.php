<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Commentaire;
use App\Models\Visiteur;
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
        $this->call(UserSeeder::class);
        $this->call(VisiteurSeeder::class);
        $this->call(CommentaireSeeder::class);
        $this->call(FavoriSeeder::class);
        $this->call(PivotAuteurOeuvreSeeder::class);
    }
}
