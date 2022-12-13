@extends('master')

@section('title', 'Liste des Oeuvre')


@section('main')

    @can('create', \App\Models\Oeuvre::class )
        <h4><a href="{{ route('oeuvre.create') }}">Nouvel oeuvre</a></h4>
    @endcan

    <form action="{{route('oeuvre.index')}}" method="get">
        <select name="nom">
            <option value=""  selected >-- Tous nom d'auteur --</option>
            @foreach($auteurs as $auteur)
                <option value="{{$auteur->id}}" @if($param == $auteur->id) selected @endif>{{$auteur->nom}}</option>
            @endforeach
        </select>
        <input type="submit" value="Recherche">
    </form>
    <a href="{{ route('oeuvre.index',["action"=>"note"]) }}">voir les oeuvres les mieux note</a></br>
    <a href="{{ route('oeuvre.index',["action"=>"top"]) }}">voir les oeuvres les moins recentes</a>
    @if(!empty($oeuvres))
        <ul>
            @foreach($oeuvres as $oeuvre)
                @if(Auth::user())
                    @foreach($list_fav as $fav)
                        @if($oeuvre->id === $fav->id )
                            est dans tes fav <a href="{{ route('oeuvre.index',["action"=>"supr_fav","id_o"=>$oeuvre->id]) }}">suprimer des favorie</a>
                        @else
                            <a href="{{ route('oeuvre.index',["action"=>"ajouter_fav","id_o"=>$oeuvre->id]) }}">ajouter au favorie</a>
                        @endif
                    @endforeach
                @endif
                <br>
                @can('createOeuvre', $oeuvre)
                    <h4><a href="{{ route('oeuvre.create') }}">Nouveau oeuvre</a></h4>
                @endcan
                <a href="{{ route('oeuvre.show', $oeuvre->id) }}"> Voir detail de l'oeuvre</a>
                <strong>name :</strong>  {{ $oeuvre->nom}}</br>
                <strong>description : </strong> {{ $oeuvre->description }}</br>
                <strong>dateInscription :</strong> {{ $oeuvre->dateInscription }}</br>
                <strong>lien :</strong> {{ $oeuvre->lien }}</br>

                <hr>
            @endforeach
        </ul>

    @else
        <h3>aucun oeuvre</h3>
    @endif
@endsection
