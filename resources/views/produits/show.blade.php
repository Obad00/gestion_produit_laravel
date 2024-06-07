{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<div class="container">
    <h1 class="my-4">{{ $produit->nom }}</h1>

    <div class="card">
        <img src="{{ $produit->image_url ?? 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $produit->nom }}">
        <div class="card-body">
            <h5 class="card-title">{{ $produit->nom }}</h5>
            <p class="card-text">{{ $produit->description }}</p>
            <p class="card-text"><strong>Prix :</strong> {{ $produit->prix }} €</p>
            <p class="card-text"><strong>Catégorie :</strong> {{ $produit->categorie->libelle }}</p> <!-- Assuming you have a relationship set up with the category -->
        </div>
    </div>
</div>
{{-- @endsection --}}
