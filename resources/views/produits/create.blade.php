{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<div class="container">
    <h1 class="my-4">Ajouter un Produit</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('produits') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom du Produit</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="{{ old('prix') }}" required>
        </div>
        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select class="form-control" id="categorie_id" name="categorie_id" required>
                <option value="">Sélectionnez une catégorie</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
        </div> --}}
        <div class="form-group">
            <label for="image_url">URL de l'image</label>
            <input type="url" class="form-control" id="image_url" name="image_url" value="{{ old('image_url') }}">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
{{-- @endsection --}}
