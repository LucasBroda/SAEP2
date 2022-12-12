<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;

    function commentaires(){
        return;
        //Le visiteur peut faire plusieurs commentaires
    }


}
