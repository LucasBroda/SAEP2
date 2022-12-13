<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VisiteurController extends Controller
{
    /**
     * Affichage et modification des informations d’un visiteur
     * L'utilisateur doit être connecté pour arriver ici
     */
    public function index() {

        // Changer quand l'authentification sera faite
        $user = User::find(Auth::user());
        return view('visiteur.index', [
            'visiteur' => $user->visiteur
        ]);
    }

    /**
     * Upload du nouvel avatar d'un visiteur
     */
    public function upload(Request $request) {
        // Changer quand l'authentification sera faite
        $visiteur = User::find(Auth::user()->visiteur);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
            $nom = 'avatar';
            $now = time();
            $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());
            $file->storeAs('images', $nom);
            if ($visiteur->url_avatar != '/storage/images/default-avatar.png') {
                Storage::delete($visiteur->url_avatar);
            }
            $visiteur->url_avatar = '/storage/images/'.$nom;
            $visiteur->save();
        }
        return redirect()->route('visiteur.info');
    }
}
