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

    .alert {
        margin-bottom: 20px;
    }

    p {
        margin-bottom: 20px;
        font-size: 18px;
    }

    .btn-primary {
        width: 100%;
    }
</style>
<br><br><br><br>
    <div class="container">
        <h1>Confirmation de commande</h1>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <p>Merci pour votre commande! Vous recevrez bientôt une confirmation par e-mail.</p>
        <a href="/" class="btn btn-primary">Continuer vos achats</a>
    </div>

