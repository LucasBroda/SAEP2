@extends('master')

@section('title', 'Liste des Oeuvre')


@section('main')

    @can('create', \App\Models\Pokemon::class )
        <h4><a href="{{ route('oeuvre.create') }}">Nouvel oeuvre</a></h4>
    @endcan

    <h6>Recherche tous les pokemons qui on moins de X point de vie</h6>

    @if(!empty($oeuvres))
        <ul>
            @foreach($oeuvres as $oeuvre)
                <br>
                    @can('createPokemon', $oeuvre)
                        <h4><a href="{{ route('oeuvre.create') }}">Nouveau oeuvre</a></h4>
                    @endcan
                    <a href="{{ route('oeuvre.show', $oeuvre->id) }}"> Voir detail pokemon</a>
                    <strong>name :</strong>  {{ $oeuvre->name}}</br>
                    <strong>description : </strong> {{ $oeuvre->description }}</br>
                    <strong>dateInscription :</strong> {{ $oeuvre->dateInscription }}</br>
                        <strong>lien :</strong> {{ $oeuvre->lien }}</br>
                    @can('update', $oeuvre)
                    <a href="{{ route('oeuvre.edit', $oeuvre->id) }}"> EDIT </a>
                            @endcan
                            <hr>
        </ul>
        @endforeach

    @else
        <h3>aucun oeuvre</h3>
    @endif


@endsection
