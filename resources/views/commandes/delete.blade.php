<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmer la suppression</title>
</head>
<body>
    <h1>Confirmer la suppression</h1>
    <p>Êtes-vous sûr de vouloir supprimer cette commande ?</p>
    <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
        <a href="{{ route('commandes.index') }}">Annuler</a>
    </form>
</body>
</html>