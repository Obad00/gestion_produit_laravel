<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .container {
        max-width: 500px;
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

    label {
        font-weight: bold;
    }

    .form-control {
        margin-bottom: 20px;
    }

    textarea.form-control {
        height: 100px;
    }

    button[type="submit"] {
        width: 100%;
    }
</style>
<br><br><br><br>


<div class="container">
    <h1>Modifier la catégorie</h1>
    <form action="{{ route('categories.update', $categorie) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{ old('libelle', $categorie->libelle) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $categorie->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
