@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                  <h1 class="display-5 fw-bold">{{ $visiteur->prenom }} {{ $visiteur->nom }}</h1>
                  <img src="{{ url($visiteur->url_avatar) }}" alt="avatar" srcset="" width="200px">
                  <form method="post" action="{{route('visiteur.upload')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="avatar">Modifier l'avatar</label>
                      <input type="file" class="form-control-file" id="avatar" name="avatar">
                      <button class="btn btn-secondary" type="submit">Valider</button>
                    </div>
                  </form>
                </div>
            </div> 
            <div class="col-md-6">
                <h3>Mes commentaires</h3>
                <ul>
                    @foreach ($visiteur->commentaires as $comment)
                    <li>
                      <div class="card" style="width: 18rem; margin: 50px 0;">
                        <div class="card-body">
                          <a href=" {{ route('oeuvre.show', ['oeuvre' => $comment->oeuvre]) }} " class="icon-link d-inline-flex align-items-center">
                            Oeuvre : {{ $comment->oeuvre->nom }}
                            <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                          </a>
                          <h5 class="card-title"> {{ $comment->titre }}</h5>
                          <p class="card-text"> {{ $comment->corp }}</p>
                          <a href="#" class="btn btn-secondary">Modifier le commentaire</a>
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