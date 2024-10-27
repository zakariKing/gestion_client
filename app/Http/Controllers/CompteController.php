<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    // Afficher la liste des comptes
    public function index()
    {
        $comptes = Compte::with('client')->get(); // Avec la relation client
        return view('compte.index', compact('comptes'));
    }


    // Afficher le formulaire de création d'un compte
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $clients = Client::orderby('nom','asc')->get();
        return view('compte.create',compact('clients'));
    }

// Stocker un nouveau compte dans la base de données
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validation des données
        $validatedData = $request->validate([
            'rib' => 'required|string|max:255',
            'solde' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
        ]);

        // Création du compte avec toutes les données validées
        Compte::create([
            'rib' => $validatedData['rib'],
            'solde' => $validatedData['solde'],
            'client_id' => $validatedData['client_id'],  // Assurez-vous que client_id est bien inclus ici
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirection après succès
        return redirect()->route('compte.index')->with('success', 'Compte créé avec succès');
    }

    // Afficher le formulaire de modification d'un compte
    public function edit($id)
    {
        $compte = Compte::findOrFail($id);
        if (!$compte) {
            return redirect()->route('compte.index')->with('error', 'Compte non trouvé');
        }
        $clients = Client::all();
        return view('compte.edit', compact('compte','clients'));
    }

    // Mettre à jour un compte existant dans la base de données
    public function update(Request $request,$id )
    {
//        dd($request->all());//verifier les données
//         Validation des données du formulaire
        $validatedData = $request->validate([
            'rib' => 'required|string|max:255|unique:comptes',
            'solde' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
        ]);


        // Mise à jour du compte
        $id= Compte::findOrFail($id);
        if (!$id) {
            return redirect()->route('compte.index')->with('error', 'Compte non trouvé');
        }
        $id->update([
            'rib' =>$request->input('rib'),
            'solde' => $request->input('solde'),
            'client_id' => $request->input('client_id')
        ]);

        // Rediriger vers la liste des comptes
        return redirect()->route('compte.index')->with('success', 'Compte mis à jour avec succès');
    }

    // Supprimer un compte de la base de données
    public function destroy($id)
    {
        $id= Compte::findOrFail($id);
        if (!$id) {
            return redirect()->route('compte.index')->with('error', 'Compte non trouvé');
        }
        $id->delete();

        // Rediriger vers la liste des comptes
        return redirect()->route('compte.index')->with('success', 'Compte supprimé avec succès');
    }
}
