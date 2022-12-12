@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Visiteur connecté : </h1> 
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">{{ $visiteur->prenom }} {{ $visiteur->nom }}</h1>
              <img src="{{ url($visiteur->url_avatar) }}" alt="" srcset="">
            </div>
          </div>   
    </div>
@endsection