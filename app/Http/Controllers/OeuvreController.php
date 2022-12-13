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
            $auteurs = Auteur::all()->pluck('nom');
            $action = $request->input('action');
            $param = $request->input('nom',null);
            $oeuvres = DB::table('auteur_oeuvre')
                ->join('auteurs','auteur_oeuvre.auteur_id','=','auteurs.id')
                ->join('oeuvres','auteur_oeuvre.oeuvre_id','=','oeuvres.id')
                ->where('auteurs.nom', '=',$param)
                ->select('oeuvres.*')
                ->get();
            if($param === null){
                $oeuvres = Oeuvre::all();
            }
            if($action === 'note'){
                $list_oeuvres=Oeuvre::all();
                $list=[];
                foreach($list_oeuvres as $oeuvre){
                    $list_commentaire = $oeuvre->comments;
                    $note_totale=0;
                    foreach ($list_commentaire as $commentaire){
                        $note_totale=$note_totale+$commentaire->note;
                    }
                    $note_oeuvre = $note_totale/count($list_commentaire);
                    $list[]=['note'=>$note_oeuvre,'oeuvre'=>$oeuvre];
                }
                array_multisort($list,SORT_DESC);
                $top_note= [];
                for($i=0;$i<=4;$i++){
                    $top_note[]=$list[$i]['oeuvre'];
                }
                return view('oeuvre.index',[
                    'oeuvres'=>$top_note,
                    'param' => Auteur::all(),
                    'auteurs' => $auteurs
                    ]);
            }
            if($action === 'top'){
                $list=DB::table('oeuvres')
                    ->orderBy('dateInscription','desc')
                    ->get();
                $oeuvres=[$list[0],$list[1],$list[2],$list[3],$list[4]];
                return view('oeuvre.index',[
                    'oeuvres'=>$oeuvres,
                    'param' => Auteur::all(),
                    'auteurs' => $auteurs,
                ]);
            }
        return view('oeuvre.index', [
            'oeuvres' => $oeuvres,
            'param' => Auteur::all(),
            'auteurs' => $auteurs
        ]);
        }
    function show($id){
        $oeuvre = Oeuvre::find($id);
        //moyenne
        $commentaires = $oeuvre->comments;
        $auteurs = $oeuvre->auteurs;
        $note_totale=0;
        $nbr_notes = 0;
        $v_max = -1;
        $v_min = 1000;
        foreach ($commentaires as $commentaire){
            $note_totale+=$commentaire->note;
            if($commentaire->note>$v_max){
                $v_max = $commentaire->note;
            }
            if($commentaire->note<$v_min){
                $v_min = $commentaire->note;
            }
            $nbr_notes +=1;
        }
        $nbr_fav = $oeuvre->visiteursFav()->where('oeuvre_id','=',$id)->count();
        $moyenne = $note_totale/count($commentaires);

        return view('oeuvre.show', [
            'oeuvre' => $oeuvre,
            'auteurs' => $auteurs,
            'commentaires' => $commentaires,
            'moyenne'=> $moyenne,
            'v_max'=> $v_max,
            'v_min'=> $v_min,
            'nbr_notes'=> $nbr_notes,
            'nbr_fav'=> $nbr_fav,
        ]);
    }
}
