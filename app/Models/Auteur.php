<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    use HasFactory;

    public $timestamps = false;

    function oeuvres(){
        return $this->belongsToMany(Oeuvre::class);
        //Un auteur peut créé une ou plusieurs oeuvres
    }
}
