<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        h1 {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #117a8b;
            border-color: #0d6673;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #bd2130;
            border-color: #b21f2d;
        }
        form {
            display: inline;
        }
        .icon-btn {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            margin: 2px;
            font-size: 1.2rem;
        }
        .icon-btn-info {
            background-color: #17a2b8;
            color: white;
        }
        .icon-btn-warning {
            background-color: #ffc107;
            color: black;
        }
        .icon-btn-danger {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <a href="produits" class="btn btn-link">Retour</a>
        </div>
        <h1>Liste des Catégories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Créer une nouvelle catégorie</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->libelle }}</td>
                        <td>{{ $categorie->description }}</td>
                        <td>
                            <a href="{{ route('categories.show', $categorie) }}" class="icon-btn icon-btn-info" title="Voir"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('categories.edit', $categorie) }}" class="icon-btn icon-btn-warning" title="Modifier"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('categories.destroy', $categorie) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="icon-btn icon-btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
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
