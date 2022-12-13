<form method="POST" action="{{route('register')}}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input name="name" type="name" id="name" class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input name="prenom" type="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror">
        @error('prenom')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Votre adresse email</label>
        <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror">
        @error('email')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Votre mot de passe</label>
        <input name="password" type="password" id ="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmation du mot de passe</label>
        <input name="password_confirmation" type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Register</button>

</form>

