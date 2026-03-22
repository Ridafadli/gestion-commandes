<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with(['client', 'produit'])
            ->latest()
            ->get();

        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        $clients = Client::orderBy('nom')->get();
        $produits = Produit::orderBy('nom')->get();

        return view('commandes.create', compact('clients', 'produits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'produit_id' => ['required', 'exists:produits,id'],
            'quantite' => ['required', 'integer', 'min:1'],
        ]);

        Commande::create($validated);

        return redirect()
            ->route('commandes.index')
            ->with('success', 'Commande créée avec succès.');
    }

    public function show(Commande $commande)
    {
        $commande->load(['client', 'produit']);

        return view('commandes.show', compact('commande'));
    }

    public function edit(Commande $commande)
    {
        $clients = Client::orderBy('nom')->get();
        $produits = Produit::orderBy('nom')->get();

        return view('commandes.edit', compact('commande', 'clients', 'produits'));
    }

    public function update(Request $request, Commande $commande)
    {
        $validated = $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'produit_id' => ['required', 'exists:produits,id'],
            'quantite' => ['required', 'integer', 'min:1'],
        ]);

        $commande->update($validated);

        return redirect()
            ->route('commandes.index')
            ->with('success', 'Commande mise à jour avec succès.');
    }

    public function destroy(Commande $commande)
    {
        $commande->delete();

        return redirect()
            ->route('commandes.index')
            ->with('success', 'Commande supprimée avec succès.');
    }
}
