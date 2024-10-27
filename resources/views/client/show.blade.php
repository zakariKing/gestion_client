@extends('layouts.app')
@section('title', 'detail du client '.$client->id)
@section('content')
    <!-- Card Container -->
    <div class="max-w-lg mx-auto  bg-white shadow-lg rounded-lg overflow-hidden mt-6 ">
        <!-- Header -->
        <div class="px-6 py-4 bg-indigo-500">
            <h2 class="text-white text-2xl font-semibold">Client Details</h2>
        </div>

        <!-- Client Info -->
        <div class="px-6 py-4">
            <ul class="space-y-2">
                <li class="text-gray-800 text-lg"><span class="font-semibold">Nom:</span> {{$client->nom}}</li>
                <li class="text-gray-800 text-lg"><span class="font-semibold">Prénom:</span> {{$client->prenom}}</li>
                <li class="text-gray-600 text-sm">
                    <span class="font-semibold">Date de création:</span>
                    {{ $client->created_at ? $client->created_at->format('d M Y') : 'N/A' }}
                </li>
                <li class="text-gray-600 text-sm">
                    <span class="font-semibold">Date de modification:</span>
                    {{ $client->updated_at ? $client->updated_at->format('d M Y') : 'N/A' }}
                </li>
            </ul>
        </div>

        <!-- Accounts Info -->
        <div class="px-6 py-4 bg-blue-50">
            <h3 class="text-indigo-600 text-xl font-semibold underline mb-2">Les Comptes</h3>
            @foreach ($client->comptes as $compte)
                <div class="mb-4 border-b border-gray-300 pb-2">
                    <ul class="space-y-1 text-gray-700">
                        <li><span class="font-semibold">Numéro:</span> {{$compte->rib}}</li>
                        <li><span class="font-semibold">Solde:</span> {{$compte->solde}} MAD</li>
                        <li class="text-sm text-gray-600">
                            <span class="font-semibold">Date de création:</span>
                            {{ $compte->created_at ? $compte->created_at->format('d M Y') : 'N/A' }}
                        </li>
                        <li class="text-sm text-gray-600">
                            <span class="font-semibold">Date de modification:</span>
                            {{ $compte->updated_at ? $compte->updated_at->format('d M Y') : 'N/A' }}
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection
