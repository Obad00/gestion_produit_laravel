<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



<a href="{{ route('paniers.index') }}">
    <i class="fa fa-shopping-cart"></i> <!-- Utilisation de Font Awesome -->
    <!-- <img src="chemin_vers_icone_panier.png" alt="Panier"> --> <!-- Icône personnalisée -->
</a>

<a href="login" class="btn btn-primary" type="button">Se connecter</a>


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

