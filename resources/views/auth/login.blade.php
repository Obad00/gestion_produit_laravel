<div class="card">
    <h1>Se connecter</h1>
    <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
        @csrf
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger mt-1">Renseigner votre email</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-3">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
            id="password" name="password" value="{{ old('password') }}">
            @error('password')
                <div class="text-danger">votre mot de passe</div>
            @enderror
        </div>
        <hr>
        <button class="btn btn-primary">Se connecter</button>
    </form>
     <br>
    <!-- Bouton de retour -->
    <a href="/" class="btn btn-link mt-3">Retour</a>
</div>