<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oeuvre extends Model
{
    use HasFactory;

    public $timestamps = false;

    function auteurs(){
        return ;
        //Une oeuvre peut être réalisée par un ou plusieurs auteurs
    }
}
