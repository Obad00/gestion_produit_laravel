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
            margin-top: -30px;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff !important;
        }

        /* Style pour la description de la plateforme */
        .description {
            text-align: center;
            margin: 30px 0;
            font-size: 18px;
        }

        /* Style pour le contenu */
        .container {
            margin-top: 50px;
        }
        .card {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .card-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 20px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .card-body {
            flex: 1;
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

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
        .footer a {
            color: white;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
         /* Style pour le carousel */
         .carousel-item img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .description {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-in-out, transform 1s ease-in-out;
        }
        .description.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">DIWAN TECH</a>
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
                        <a class="nav-link" href="{{ route('auth.login') }}">Administration</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bannière avec carousel Bootstrap -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://img.freepik.com/free-photo/high-angle-photographer-holding-camera_23-2150264510.jpg?t=st=1717959512~exp=1717963112~hmac=4e902de77f0400f08f4d14846fd93010a1d6b76ec06cab73e387815de19271e3&w=996" 
                class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="https://img.freepik.com/premium-psd/smartphone-laptop-dark-mockup_117023-2975.jpg?w=1060" 
                class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="https://img.freepik.com/premium-psd/tablet-pro-mockup_216266-453.jpg"
                 class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="https://img.freepik.com/free-photo/laptop-mobile-phone-table-with-sand-dunes-3d-rendering_1142-54507.jpg?t=st=1717960995~exp=1717964595~hmac=f124aefcadb1c1a2198bc3f3e9ef744556a08514d25179099bc6c8a5262595b0&w=996"
                 class="d-block w-100" alt="Image 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Description de la plateforme -->
    <div class="container">
        <div class="description">
            <h2>Bienvenue sur notre plateforme</h2>
            <p>Découvrez une sélection unique de produits de qualité. Ajoutez vos articles préférés à votre panier et passez commande en toute simplicité.</p>
        </div>
    </div>

    <div class="container">
        <h1 class="my-4">Liste des Produits</h1>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            @foreach($produits as $produit)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="{{ $produit->image_url ?? 'https://via.placeholder.com/150' }}" class="card-img" alt="{{ $produit->nom }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->nom }}</h5>
                        <p class="card-text">{{ Str::limit($produit->description , 100);}}</p>
                        <p class="card-text"><strong>Prix :</strong> {{ $produit->prix }} FCFA</p>
                        <a href="{{ url('clients/' . $produit->id) }}" class="btn btn-primary">Voir les détails</a>
                        <form action="{{ route('ajouter-au-panier', ['produit' => $produit->id]) }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer class="footer text-center mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Liens Rapides</h5>
                    <ul class="list-unstyled">
                        <li><a href="/">Accueil</a></li>
                        <li><a href="#">Produits</a></li>
                        <li><a href="#">À Propos</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contactez-Nous</h5>
                    <ul class="list-unstyled">
                        <li>Adresse: 123 Rue Batrain, Dakar, Sénégal</li>
                        <li>Téléphone: +221 77 142 52 49</li>
                        <li>Email: daboadama@diwan.com</li>
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
            <p class="text-muted">© 2024 DIWAN TECH. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <script>
        window.addEventListener('load', function () {
            const description = document.querySelector('.description');
            description.classList.add('visible');
            setTimeout(() => {
                description.classList.remove('show-immediately');
            }, 100); 
            setInterval(() => {
                description.classList.add('visible');
                setTimeout(() => {
                    description.classList.remove('visible');
                }, 4000); 
            }, 5000); 
        });
    </script>
</body>
</html>
