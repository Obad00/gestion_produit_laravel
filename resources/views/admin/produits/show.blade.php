<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            border: none;
        }
        .card-img-top {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        .card-body {
            padding-top: 15px;
        }
        h1, h5 {
            color: #343a40;
        }
        .card-text {
            font-size: 16px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <a href="{{ route('produits.index') }}" class="btn btn-link">Retour</a>
        </div>
    
        <h1 class="my-4">{{ $produit->nom }}</h1>

        <div class="card">
            <img src="{{ $produit->image_url ?? 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $produit->nom }}">
            <div class="card-body">
                <h5 class="card-title">{{ $produit->nom }}</h5>
                <p class="card-text">{{ $produit->reference }}</p>
                <p class="card-text">{{ $produit->description }}</p>
                <p class="card-text"><strong>Prix :</strong> {{ $produit->prix }} FCFA</p>
                <p class="card-text"><strong>Catégorie :</strong> {{ $produit->categorie->libelle }}</p> 
                <p class="card-text"><strong>Description de la Catégorie :</strong> {{ $produit->categorie->description }}</p>
            </div>
        </div>
    </div>
<br>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
