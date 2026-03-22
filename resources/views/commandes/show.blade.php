<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la commande</title>
</head>
<body>
    <h1>Détails de la commande</h1>

    <p><strong>ID :</strong> {{ $commande->id }}</p>
    <p><strong>Client :</strong> {{ $commande->client->nom }}</p>
    <p><strong>Email client :</strong> {{ $commande->client->email }}</p>
    <p><strong>Produit :</strong> {{ $commande->produit->nom }}</p>
    <p><strong>Prix unitaire :</strong> {{ number_format($commande->produit->prix, 2, ',', ' ') }} DH</p>
    <p><strong>Quantité :</strong> {{ $commande->quantite }}</p>
    <p><strong>Montant total :</strong> {{ number_format($commande->quantite * $commande->produit->prix, 2, ',', ' ') }} DH</p>
    <p><strong>Date de commande :</strong> {{ $commande->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('commandes.index') }}">Retour à la liste</a>
</body>
</html>
