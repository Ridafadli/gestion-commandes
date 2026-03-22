<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une commande</title>
</head>
<body>
    <h1>Créer une nouvelle commande</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('commandes.store') }}" method="POST">
        @csrf

        <label for="client_id">Client :</label>
        <select name="client_id" id="client_id" required>
            <option value="">-- Sélectionner un client --</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" @selected(old('client_id') == $client->id)>
                    {{ $client->nom }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label for="produit_id">Produit :</label>
        <select name="produit_id" id="produit_id" required>
            <option value="">-- Sélectionner un produit --</option>
            @foreach($produits as $produit)
                <option value="{{ $produit->id }}" @selected(old('produit_id') == $produit->id)>
                    {{ $produit->nom }} - {{ number_format($produit->prix, 2, ',', ' ') }} DH
                </option>
            @endforeach
        </select>
        <br><br>

        <label for="quantite">Quantité :</label>
        <input type="number" name="quantite" id="quantite" min="1" value="{{ old('quantite', 1) }}" required>
        <br><br>

        <button type="submit">Créer</button>
        <a href="{{ route('commandes.index') }}">Retour</a>
    </form>
</body>
</html>
