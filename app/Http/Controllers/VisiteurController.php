<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Utilisateur;
use App\Models\Visiteur;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class VisiteurController extends Controller
{
    /**
     * Affichage et modification des informations d’un visiteur  
     * L'utilisateur doit être connecté pour arriver ici
     */
    public function index(Request $request) {
        $user = Utilisateur::find(1);
        // Changer quand l'authentification sera faite
        // $user = User::find(Auth::user()); 
        return view('visiteur.index', [
            'visiteur' => $user->visiteur
        ]);
    }
}
