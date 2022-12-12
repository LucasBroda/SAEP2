<?php

namespace Database\Seeders;

use App\Models\ListeFavorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListeFavorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListeFavorie::factory(20)->create();
    }
}
