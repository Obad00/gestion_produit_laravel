<h1>Mes produits</h1>
{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<div class="container">
    <h1 class="my-4">Liste des Produits</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @auth
    <a href="{{ url('produits/create') }}" class="btn btn-primary mb-3">Ajouter un Produit</a>
    @endauth

    <div class="row">
        @foreach($produits as $produit)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $produit->image_url ?? 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $produit->nom }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $produit->nom }}</h5>
                    <p class="card-text">{{ Str::limit($produit->description , 100);}}</p>
                    <p class="card-text"><strong>Prix :</strong> {{ $produit->prix }} €</p>
                    {{-- <p class="card-text"><strong>Stock :</strong> {{ $produit->stock }}</p> --}}
                    <a href="{{ url('produits/' . $produit->id) }}" class="btn btn-primary">Voir les détails</a>
                    @auth
                    <a href="{{ url('produits/' . $produit->id . '/edit') }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ url('produits/' . $produit->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{-- @endsection --}}
