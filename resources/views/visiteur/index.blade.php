@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                  <h1 class="display-5 fw-bold">{{ $visiteur->prenom }} {{ $visiteur->nom }}</h1>
                  <img src="{{ url($visiteur->url_avatar) }}" alt="avatar" srcset="">
                </div>
            </div> 
            <div class="col-md-6">
                <h3>Mes commentaires</h3>
                <ul>
                    @foreach ($visiteur->commentaires as $comment)
                    <li>
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">Oeuvre : {{ $comment->oeuvre->nom }}</strong>
                                <h3 class="mb-0"> {{ $comment->titre }} </h3>
                                <div class="mb-1 text-muted"> {{ $comment->dateUpdate }} </div>
                                <p class="card-text mb-auto"> {{ $comment->corp }}</p>
                                <a href="#" class="stretched-link">Modifier le commentaire</a>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Note : {{ $comment->note }} / 5</text></svg>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                
            </div>
          </div> 
        
          <div class="list-group w-auto">
            <h3>Mes oeuvres favorites</h3>
            <ul>
                @foreach ($visiteur->favoris as $favorite)
                    <li>
                        <a href="{{ route('oeuvre.show', ['oeuvre' => $favorite]) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                          <img src="https://github.com/twbs.png" alt="twbs" class="rounded-circle flex-shrink-0" width="32" height="32">
                          <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                              <h6 class="mb-0">{{ $favorite->nom }} </h6>
                              <p class="mb-0 opacity-75"> {{ $favorite->description}}</p>
                            </div>
                            <small class="opacity-50 text-nowrap">Cliquez pour voir l'oeuvre</small>
                          </div>
                        </a>
                    </li>
                @endforeach
            </ul>
            
          </div>

    </div>
@endsection