
    <div class="container">
        <h1>Confirmation de commande</h1>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <p>Merci pour votre commande! Vous recevrez bientôt une confirmation par e-mail.</p>
        <a href="{{ route('clients.index') }}" class="btn btn-primary">Continuer vos achats</a>
    </div>

