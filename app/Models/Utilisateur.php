<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    function visiteur(){
        return;
        //Un utilisateur peut avoir un seul compte pour un visiteur
    }
}
