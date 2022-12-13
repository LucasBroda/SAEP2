<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nom',
        'prenom',
        'user_id'
    ];

    function commentaires(){
        return $this->hasMany(Commentaire::class);
        //Le visiteur peut faire plusieurs commentaires
    }

    /**
     * Un visiteur peut avoir plusieurs oeuvres favorites
     */
    function favoris() {
        return $this->belongsToMany(Oeuvre::class);
    }

    /**
     * Le visiteur peut avoir un compte user
     */
    function utilisateur() {
        return $this->belongsTo(User::class);
    }


}
