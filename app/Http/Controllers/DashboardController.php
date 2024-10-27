<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Compte;
use App\Models\Virement;

class DashboardController
{
    public function index()
    {
        $clients = Client::all();
        $comptes = Compte::all();
        $virements = Virement::all();

//       les 3 dernier operation
        // Récupérer les trois derniers éléments
        $latestClients = Client::latest()->take(5)->get();
        $latestComptes = Compte::latest()->take(5)->get();
        $latestVirements = Virement::with(['compteEmetteur.client', 'compteRecepteur.client'])->latest()->take(5)->get();
        return view('dashboard', compact('clients', 'comptes', 'virements', 'latestClients', 'latestComptes', 'latestVirements'));
    }
}
