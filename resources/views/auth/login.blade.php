<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .card {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .card form {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: bold;
    }

    .text-danger {
        color: red;
    }

    .btn-link {
        color: blue;
    }
</style>

<br>
<br>
<br>
<div class="card p-4">
    <h1 class="text-center mb-4">Connexion</h1>
    <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
        @csrf
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger mt-1">Renseignez votre email</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
            id="password" name="password" value="{{ old('password') }}">
            @error('password')
                <div class="text-danger">Renseignez votre mot de passe</div>
            @enderror
        </div>
        <button class="btn btn-primary w-100">Se connecter</button>
       
    </form>
    <a href="{{ route('auth.register') }}" class="btn btn-primary w-100">S'inscrire</a>
    <div class="text-center mt-3">
        <a href="/" class="btn btn-link">Retour</a>
    </div>
</div>
