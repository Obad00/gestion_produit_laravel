<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Style pour la barre de navigation */
        .navbar {
            background-color: #343a40 !important;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff !important;
        }

        /* Style pour le contenu */
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-title {
            font-size: 1.2rem;
        }
        .card-text {
            font-size: 1rem;
        }

        /* Style pour les boutons */
        .btn-primary, .btn-primary:hover {
            background-color: #007bff !important;
            border-color: #007bff !important;
        }
        .btn-warning, .btn-warning:hover {
            background-color: #ffc107 !important;
            border-color: #ffc107 !important;
        }
        .btn-danger, .btn-danger:hover {
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
        }
        .btn-info, .btn-info:hover {
            background-color: #17a2b8 !important;
            border-color: #17a2b8 !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Mon Application</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('paniers.index') }}">
                            <i class="fa fa-shopping-cart"></i> Panier
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login') }}">Se connecter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="my-4">Liste des Produits</h1>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            @foreach($produits as $produit)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $produit->image_url ?? 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $produit->nom }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->nom }}</h5>
                        <p class="card-text">{{ $produit->reference }}</p>
                        <p class="card-text">{{ Str::limit($produit->description , 100);}}</p>
                        <p class="card-text"><strong>Prix :</strong> {{ $produit->prix }} FCFA</p>
                        <a href="{{ url('produits/' . $produit->id) }}" class="btn btn-primary">Voir les détails</a>
                        <form action="{{ route('ajouter-au-panier', ['produit' => $produit->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer class="footer bg-dark text-white text-center mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Liens Rapides</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Produits</a></li>
                        <li><a href="#">À Propos</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contactez-Nous</h5>
                    <ul class="list-unstyled">
                        <li>Adresse: 123 Rue Principale, Ville, Pays</li>
                        <li>Téléphone: +1234567890</li>
                        <li>Email: info@example.com</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Suivez-Nous</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="text-muted">© 2024 Votre Société. Tous droits réservés.</p>
        </div>
    </footer>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
