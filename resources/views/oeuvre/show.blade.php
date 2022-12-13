@extends('master')

@section('title', 'Détail dune oeuvre'.$oeuvre->name)


@section('main')
    <div class="text-center" style="margin-top: 2rem">
        <h3>Affichage d'une Oeuvre</h3>
        <hr class="mt-2 mb-2">
        <table>
            <br style="background-color: #ddd; font-weight: bold;">
            <br>
            <strong>nom         :</strong>{{ $oeuvre->nom }}</br>
            <strong>description :</strong>{{ $oeuvre->description }}</br>
            <strong>date ajout  :</strong>{{ $oeuvre->dateInscription }}</br>
            <strong>auteurs     :</strong></br>
            <ul>
                @foreach($auteurs as $auteur)
                    <br>
                    <strong>nom :</strong>  {{ $auteur->nom}}</br>
                    <strong>prenom : </strong> {{ $auteur->prenom }}</br>
                    <strong>nationalite :</strong> {{ $auteur->nationalite }}</br>
                    <strong>date de naissance :</strong> {{ $auteur->dateDeNaissance }}</br>
                    <hr>
            </ul>
            @endforeach
        </table>
        @endsection


        @section('footer')
            @parent
            <a href="{{ route('oeuvre.index') }}"> <h4>retour</h4></a>
@endsection
