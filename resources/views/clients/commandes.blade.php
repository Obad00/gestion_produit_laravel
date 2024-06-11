<div class="container">
    <h1>Mes commandes</h1>
    @if ($commandes->isEmpty())
        <p>Vous n'avez aucune commande pour le moment.</p>
    @else
        @foreach ($commandes as $commande)
            <div class="card mb-3">
                <div class="card-header">
                    Commande #{{ $commande->id }}
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($commande->produits as $produit)
                            <li>{{ $produit->nom }} - {{ $produit->pivot->quantite }} - {{ $produit->pivot->prix }}</li>
                        @endforeach
                    </ul>
                    <p>Total: {{ $commande->montant }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
