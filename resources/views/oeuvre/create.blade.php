<form action="{{route('oeuvre.store')}}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Création d'un commentaire</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- Titre  --}}
        <label for="titre"><strong>Titre : </strong></label>
        <input type="text" name="titre" id="titre"

    </div>
    <div>
        {{-- Corp --}}
        <label for="corp"><strong>Corp : </strong></label>
        <input type="text" class="form-control" id="corp" name="corp"

    </div>
    <div>
        {{-- Note --}}
        <label for="note"><strong>Note : </strong></label>
        <input type="number" class="form-control" id="note" name="note"

    </div>

    <div>
        {{-- Date --}}
        <label for="date"><strong>Date de l'update : </strong></label>
        <input type="date" class="form-control" id="date" name="date"

    </div>


    <div>
        <button class="btn btn-success" type="submit">Valider</button>
    </div>
</form>
<h2><a href="{{ route('oeuvre.index') }}">retour</a></h2>
