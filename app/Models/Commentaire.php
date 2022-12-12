<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    public $timestamps = false;

    function visiteur(){
        return $this->belongsTo(Visiteur::class);
        //Un commentaire est créé par un visiteur
    }

    /**
     * Un commentaire appartient à une oeuvre
     */
    function oeuvre() {
        return $this->belongsTo(Oeuvre::class);
    }
}
