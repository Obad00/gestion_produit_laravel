<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Commandes</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .table {
            background-color: #fff;
        }
        .table thead th {
            background-color: #343a40;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>
<body>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
