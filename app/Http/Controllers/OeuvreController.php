<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Oeuvre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class OeuvreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(Request $request) {
        $oeuvres = Oeuvre::all();
        $auteurs = Auteur::select('nom')->get();
        $param = $request->input('nom', 'all');
        $oeuvres = DB::table('oeuvres')
            ->join('auteurs','oeuvres_id','=','auteurs.id')
            ->where('auteurs.nom', '=',$param)
            ->select('oeuvres.*','auteurs.id','auteurs.nom as oeuvre_nom')
            ->get();
        return view('oeuvre.index', [
            'oeuvres' => $oeuvres,
            'param' => Auteur::all(),
            'auteurs' => $auteurs
        ]);
    }
}
