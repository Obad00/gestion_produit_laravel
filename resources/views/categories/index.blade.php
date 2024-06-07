{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<div class="container">
    <h1>Liste des Catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Créer une nouvelle catégorie</a>
    <table class="table mt-3">
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
                        <a href="{{ route('categories.show', $categorie) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('categories.destroy', $categorie) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

