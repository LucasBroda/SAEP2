<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oeuvre extends Model
{
    use HasFactory;

    public $timestamps = false;

    function auteurs(){
        return $this->belongsToMany(Auteur::class);
        // Une oeuvre peut être réalisée par un ou plusieurs auteurs
    }

    /**
     * Une oeuvre peut avoir plusieurs commentaires
     */
    function comments() {
        return $this->hasMany(Commentaire::class);
    }
}
