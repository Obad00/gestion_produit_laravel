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

    p {
        margin-bottom: 10px;
    }

    strong {
        font-weight: bold;
    }

    .btn-secondary {
        margin-top: 20px;
    }
</style>
<br><br>
<div class="container">
    <h1>Détails de la catégorie</h1>
    <p><strong>ID :</strong> {{ $categorie->id }}</p>
    <p><strong>Libellé :</strong> {{ $categorie->libelle }}</p>
    <p><strong>Description :</strong> {{ $categorie->description }}</p>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>

