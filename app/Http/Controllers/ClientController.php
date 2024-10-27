<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('nom', 'ASC')->get();
        return view("client.index", compact('clients'));
    }

    public function create()
    {
        return view("client.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ], [
            'nom.required' => 'Le nom est requis.',
            'prenom.required' => 'Le prénom est requis.',
        ]);

        $client = Client::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('client.index')->with('success', 'client créé avec succès');
    }

    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        if (!$client) {
            return redirect()->route('client.index')->with('error', 'client non trouvé');
        }
        $comptes = $client->comptes ?? [];
        return view("client.show", compact('client','comptes'));
    }

    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        if (!$client) {
            return redirect()->route('client.index')->with('error', 'client non trouvé');
        }
        return view("client.edit", compact('client'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $client = Client::findOrFail($id);
        if (!$client) {
            return redirect()->route('client.index')->with('error', 'client non trouvé');
        }
        $client->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'updated_at' => now(),
        ]);


        return redirect()->route('client.index')->with('success', 'client mis à jour avec succès');
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        if (!$client) {
            return redirect()->route('client.index')->with('error', 'client non trouvé');
        }
        $client->delete();

        return redirect()->route('client.index')->with('success', 'client supprimé avec succès');
    }
}
