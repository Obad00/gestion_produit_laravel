
<div class="container">
    <h1>Liste des Commandes</h1>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Retour</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Référence</th>
                <th>Nom Client</th>
                <th>Adresse Client</th>
                <th>Téléphone Client</th>
                <th>Statut</th>
                <th>Montant</th>
                <th>Produits</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->reference }}</td>
                    <td>{{ $commande->nom_client }}</td>
                    <td>{{ $commande->adresse_client }}</td>
                    <td>{{ $commande->telephone_client }}</td>
                    <td>{{ $commande->statut }}</td>
                    <td>{{ $commande->montant }} FCFA</td>
                    <td>
                        <ul>
                            @foreach($commande->produits as $produit)
                                <li>{{ $produit->nom }} (Quantité: {{ $produit->pivot->quantite }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $commande->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

