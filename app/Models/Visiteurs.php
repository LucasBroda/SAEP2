<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteurs extends Model
{
    use HasFactory;

    function utilisateur(){
        return;
        //Un visiteur doit avoir un compte utilisateur
    }
}
