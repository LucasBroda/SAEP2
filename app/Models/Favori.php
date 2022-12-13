<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    use HasFactory;

    protected $table = 'oeuvre_visiteur';

    public $timestamps = false;

    protected $fillable = [
        'oeuvre_id',
        'visiteur_id'
    ];
}
