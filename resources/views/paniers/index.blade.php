<!DOCTYPE html>
<html>
<head>
    <title>Contenu du Panier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
        }

        .alert-danger {
            margin-top: 20px;
        }

/* public/css/custom.css */

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.mx-1 {
    margin-left: 0.25rem;
    margin-right: 0.25rem;
}

/* Ajuster la taille des icônes dans les boutons */
.btn i {
    vertical-align: middle;
}


    </style>
</head>
<body>
    <div class="container">
        <div>
            <a href="{{ route('clients.dashboard') }}" class="btn btn-link">Retour</a>
        </div>
        
        <h1>Contenu du Panier</h1>

        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}

        @if (count($panier) > 0)
        <ul class="list-group">
            @foreach ($produits as $produit)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        {{ $produit->nom }} - Quantité : {{ $panier[$produit->id] }}
                    </div>
                    <div class="btn-group " role="group" aria-label="Basic example">
                        <!-- Formulaires de mise à jour de la quantité -->
                        <form action="{{ route('panier.incrementer', $produit->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm mx-1">+</button>
                        </form>
                        <form action="{{ route('panier.decrementer', $produit->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm mx-1">-</button>
                        </form>
                        <!-- Formulaire de suppression -->
                        <form action="{{ route('panier.supprimer', $produit->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-1">
                                <i class="fas fa-trash-alt fa-lg"></i> <!-- Ajustez la classe fa-lg ici -->
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
            <h2>Informations du Client</h2>
            <form action="{{ route('commande.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom_client">Nom:</label>
                    <input type="text" name="nom_client" id="nom_client" class="form-control" value="{{ old('nom_client', Auth::user()->name) }}" required>
                    @error('nom_client')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="adresse_client">Adresse:</label>
                    <input type="text" name="adresse_client" id="adresse_client" class="form-control" value="{{ old('adresse_client') }}" required>
                    @error('adresse_client')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telephone_client">Téléphone:</label>
                    <input type="text" name="telephone_client" id="telephone_client" class="form-control" value="{{ old('telephone_client') }}" required>
                    @error('telephone_client')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Passer la commande</button>
            </form>
        @else
            <p>Votre panier est vide.</p>
        @endif
    </div>
</body>
</html>
