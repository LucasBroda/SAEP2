@extends('master')

@section('title', 'Détail dune oeuvre'.$oeuvre->name)


@section('main')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Affichage d'une Oeuvre</h3>
        <li> Bonjour {{ Auth::user()->nom }}</li>
        @if (Auth::user())
            <li><a href="{{ route('oeuvre.create') }}">Création d'un nouveau commentaire</a></li>
            <li><a href="{{ route('oeuvre.edit', ['oeuvre'=>$oeuvre]) }}">Modification d'un commentaire</a></li>
            <li><a href="{{ route('oeuvre.delete', ['oeuvre'=>$oeuvre]) }}">Suppression d'un commentaire</a></li>
        @endif
        <hr class="mt-2 mb-2">
        <br>
            <br style="background-color: #ddd; font-weight: bold;">
            <br>
            <strong>nom         :</strong>{{ $oeuvre->nom }}</div>
            <strong>description :</strong>{{ $oeuvre->description }}</br>
            <strong>date ajout  :</strong>{{ $oeuvre->dateInscription }}</br>
            <img src="{{ url($oeuvre->lien) }}" alt="image oeuvre" srcset="" width="200px">
            <br>
            <strong>Statistique de l'oeuvre :</strong>
            <ul>
                <strong>moyenne :</strong> {{$moyenne}}<br>
                <strong>note maximale :</strong> {{$v_max}}<br>
                <strong>note minimale :</strong> {{$v_min}}<br>
                <strong>nombre de notes :</strong> {{$nbr_notes}}<br>
                <strong>nombre de perssone ayant cette oeuvre en favorie :</strong> {{$nbr_fav}}</br>
            </ul>
            <ul>
                <strong>auteurs     :</strong></br>
                @foreach($auteurs as $auteur)
                    <br>
                    <strong>nom :</strong>  {{ $auteur->nom}}</br>
                    <strong>prenom : </strong> {{ $auteur->prenom }}</br>
                    <strong>nationalite :</strong> {{ $auteur->nationalite }}</br>
                    <strong>date de naissance :</strong> {{ $auteur->dateDeNaissance }}</br>

                    <hr>
            @endforeach
            </ul>
            <strong>les commentaires :</strong> </br> </br>
                @foreach($commentaires as $commentaire)
                    <br>
                    <strong>titre :</strong>  {{ $commentaire->titre}}</br>
                    <strong>corp : </strong> {{ $commentaire->corp }}</br>
                    <strong>note :</strong> {{ $commentaire->note }}</br>
                    <strong>date  :</strong> {{ $commentaire->dateUpdate }}</br>
                    <hr>
                @endforeach

        @endsection


        @section('footer')
            @parent
            <a href="{{ route('oeuvre.index') }}"> <h4>retour</h4></a>
@endsection
