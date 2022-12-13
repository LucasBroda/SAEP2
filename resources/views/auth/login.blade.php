<form method="POST" action="{{route('login')}}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Votre adresse email</label>
        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror">
        @error('email')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Votre mot de passe</label>
        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Login</button>

</form>
