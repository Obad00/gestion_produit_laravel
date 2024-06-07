{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<div class="container">
    <h1>Détails de la catégorie</h1>
    <p><strong>ID :</strong> {{ $categorie->id }}</p>
    <p><strong>Libellé :</strong> {{ $categorie->libelle }}</p>
    <p><strong>Description :</strong> {{ $categorie->description }}</p>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
{{-- @endsection --}}
