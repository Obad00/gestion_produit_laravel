<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
</style>
<br><br><br>
    <div class="container">
        <h1>Contenu du Panier</h1>

        @if (count($panier) > 0)
            <ul>
                @foreach ($panier as $idProduit => $quantite)
                    <li>
                        Produit ID: {{ $idProduit }} | Quantité: {{ $quantite }}
                    </li>
                @endforeach
            </ul>

            <h2>Informations du Client</h2>
            <form action="{{ route('commande.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom_client">Nom:</label>
                    <input type="text" name="nom_client" id="nom_client" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="adresse_client">Adresse:</label>
                    <input type="text" name="adresse_client" id="adresse_client" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telephone_client">Téléphone:</label>
                    <input type="text" name="telephone_client" id="telephone_client" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Passer la commande</button>
            </form>
        @else
            <p>Votre panier est vide.</p>
        @endif
    </div>

