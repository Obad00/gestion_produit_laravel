<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin tableau de bord - Liste des Produits</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        #wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: white;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 1rem;
            text-align: center;
            font-size: 1.5rem;
            border-bottom: 1px solid #c4c4c4;
        }

        #sidebar-wrapper .list-group-item {
            border: none;
            padding: 1rem 1.5rem;
        }

        #sidebar-wrapper .list-group-item:hover {
            background-color: #495057;
        }

        #page-content-wrapper {
            flex: 1;
            padding: 2rem;
        }

        .navbar {
            padding: 0.5rem 1rem;
        }

        .content {
            padding: 2rem;
        }

        .card {
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div id="wrapper">
       
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading">DIWAN</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Tableau de bord</a>
                <a href="{{ url('produits') }}" class="list-group-item list-group-item-action bg-dark text-white">Produits</a>
                <a href="{{ url('categories') }}" class="list-group-item list-group-item-action bg-dark text-white">Catégories</a>
                <a href="{{ route('commandes.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Commandes</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Clients</a>
            </div>
        </div>
       

       
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <a href="{{ url('clients.index') }}" class="btn btn-primary">Aller à la page Clients</a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    @auth
                        <div class="dropdown">
                            <button class="btn btn dropdown-toggle user-name" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                        @csrf
                                        <button type="submit" class="btn btn-link">Déconnexion</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </nav>

            <div class="container-fluid content">
                <h1 class="my-4">Liste des Produits</h1>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @auth
                <a href="{{ url('produits/create') }}" class="btn btn-primary mb-3">Ajouter un Produit</a>
                @endauth

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
                                {{-- <p class="card-text"><strong>Stock :</strong> {{ $produit->stock }}</p> --}}
                                <a href="{{ url('produits/' . $produit->id) }}" class="btn btn-primary">Voir les détails</a>
                                @auth
                                <a href="{{ url('produits/' . $produit->id . '/edit') }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ url('produits/' . $produit->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                                </form>                    
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
