<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes</title>
</head>
<body>
    <h1>Liste des commandes</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('commandes.create') }}">Créer une nouvelle commande</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
                <th>Date de commande</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->client->nom }}</td>
                    <td>{{ $commande->produit->nom }}</td>
                    <td>{{ $commande->quantite }}</td>
                    <td>{{ number_format($commande->produit->prix, 2, ',', ' ') }} DH</td>
                    <td>{{ number_format($commande->quantite * $commande->produit->prix, 2, ',', ' ') }} DH</td>
                    <td>{{ $commande->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('commandes.show', $commande) }}">Voir</a>
                        <a href="{{ route('commandes.edit', $commande) }}">Modifier</a>
                        <form action="{{ route('commandes.destroy', $commande) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer cette commande ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Aucune commande trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
