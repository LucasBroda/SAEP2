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
            $auteurs = Auteur::all()->pluck('nom');
            $param = $request->input('nom',null);
            $cookieNom = $request->cookie('nom', null);
            $oeuvres = DB::table('auteur_oeuvre')
                ->join('auteurs','auteur_oeuvre.auteur_id','=','auteurs.id')
                ->join('oeuvres','auteur_oeuvre.oeuvre_id','=','oeuvres.id')
                ->where('auteurs.nom', '=',$param)
                ->select('oeuvres.*','auteurs.id','auteurs.nom as auteur_nom')
                ->get();
            if($param === null){
                $oeuvres = Oeuvre::all();
            }
            return view('oeuvre.index', [
                'oeuvres' => $oeuvres,
                'param' => Auteur::all(),
                'auteurs' => $auteurs
            ]);
        }
    function show(Request $request, $id)
    {
        $oeuvre = Oeuvre::find($id);
        return view('oeuvre.show', ['oeuvre' => $oeuvre]);

    }
}
