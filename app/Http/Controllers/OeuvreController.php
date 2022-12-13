<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Commentaire;
use App\Models\Oeuvre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OeuvreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(Request $request) {
            $user = Auth::user();
            $oeuvres = Oeuvre::all();
            $auteurs = Auteur::all();
            $action = $request->input('action');
            $param = $request->input('nom',null);
        if($param) {
            $auteur = Auteur::find($param);
            $oeuvres = $auteur->oeuvres;
        }
        $list_fav = [];
            if($user !== null){
                if($action === 'ajouter_fav'){
                    $id_oeuvre = $request->input('id_o');
                    $oeuvre = Oeuvre::find($id_oeuvre);
                    $oeuvre->visiteursFav()->attach($user->visiteur->id);
                    $list_fav = $user->visiteur->favoris;
                }
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
                    'param' => -1,
                    'auteurs' => $auteurs,
                    'list_fav' => $list_fav,
                    ]);
            }
            if($action === 'top'){
                $list=DB::table('oeuvres')
                    ->orderBy('dateInscription','desc')
                    ->get();
                $oeuvres=[$list[0],$list[1],$list[2],$list[3],$list[4]];
                return view('oeuvre.index',[
                    'oeuvres'=>$oeuvres,
                    'param' => -1,
                    'auteurs' => $auteurs,
                    'list_fav'=>$list_fav,
                ]);
            }
        return view('oeuvre.index', [
            'oeuvres' => $oeuvres,
            'param' => -1,
            'auteurs' => $auteurs,
            'list_fav' => $list_fav,
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

    function create(){

        $commentaire = Commentaire::all();

        if(Auth::user()->can('create',$commentaire)){
            return view('oeuvre.create', ['commentaire'=>$commentaire]);
        }

        return redirect()->route('oeuvre.index');

    }

    function delete(){
        $commentaire = Commentaire::all();

        if(Auth::user()->can('delete', $commentaire)){
            return view('oeuvre.delete', ['commentaire'=>$commentaire]);
        }

        return redirect()->route('oeuvre.delete');
    }

    function edit(){
        $commentaire = Commentaire::all();

        if(Auth::user()->can('edit', $commentaire)){
            return view('oeuvre.edit', ['commentaire'=>$commentaire]);
        }

        return redirect()->route('oeuvre.edit');
    }

    function store(Request $request){

        $this->validate(
            $request, [
                'titre' => 'required',
                'corp'=>'required',
                'note'=>'required',
                'dateUpdate'=>'required'
            ]
        );

        $commentaire = new Commentaire();

        $commentaire->titre = $request->titre;
        $commentaire->corp = $request->corp;
        $commentaire->note = $request->note;
        $commentaire->dateUpdate = $request->dateUpdate;

        $commentaire->save();

        return redirect()->route('oeuvre.index');

    }
}
