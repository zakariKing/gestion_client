<?php
namespace App\Http\Controllers;

use App\Models\Virement;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Compte;

class VirementController extends Controller
{
    public function index()
    {
        $virements = Virement::with(['compteEmetteur.client', 'compteRecepteur.client'])->get();
        return view('virement.index', compact('virements'));
    }

    public function create()
    {
        $clients = Client::orderBy('nom', 'asc')->with('comptes')->get();
        return view('virement.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'compte_emetteur' => 'required|exists:comptes,id',
            'compte_recepteur' => 'required|different:compte_emetteur|exists:comptes,id',
            'montant' => 'required|numeric|min:0',
        ]);

        $compteEmetteur = Compte::find($request->compte_emetteur);
        $compteRecepteur = Compte::find($request->compte_recepteur);

        if ($compteEmetteur->solde < $request->montant) {
            return redirect()->back()->with('error', 'Opération non autorisée, solde insuffisant.');
        }

        $compteEmetteur->solde -= $request->montant;
        $compteRecepteur->solde += $request->montant;
        $compteEmetteur->save();
        $compteRecepteur->save();

        Virement::create([
            'compte_emetteur_id' => $compteEmetteur->id,
            'compte_recepteur_id' => $compteRecepteur->id,
            'montant' => $request->montant,
        ]);

        return redirect()->route('virement.index')->with('success', 'Virement effectué avec succès.');
    }
}
