{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
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
{{-- @endsection --}}
