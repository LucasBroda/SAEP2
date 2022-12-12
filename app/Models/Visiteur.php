<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;

    public $timestamps = false;

    function commentaires(){
        return $this->hasMany(Commentaire::class);
        //Le visiteur peut faire plusieurs commentaires
    }


}
