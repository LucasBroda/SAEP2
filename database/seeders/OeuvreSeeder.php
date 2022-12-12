<?php

namespace Database\Seeders;

use App\Models\Oeuvre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OeuvreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Oeuvre::factory(20)->create();
    }
}
