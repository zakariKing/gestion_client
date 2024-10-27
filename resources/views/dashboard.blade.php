@extends('layouts.app')
@section( 'title', 'Dashboard')
@section('content')
    <x-Navbar/>
    <div class="p-6 bg-gray-900  rounded-lg my-1.5">
        <div class="flex justify-between items-center mb-4">
            <p class="text-gray-300 font-semibold text-3xl px-4 py-2 rounded-lg">Dashboard</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white p-6 rounded-lg relative">
                <p class="text-gray-900 font-semibold text-2xl">Clients</p>
                <div>
                <p class="text-gray-500 text-lg inline-block">{{ count($clients) }}</p>
                <a href="{{route('client.index')}}">
                    <button class=" hover:bg-gray-200 right-2.5 absolute rounded-lg  px-3 py-2   text-blue-500">voir plus </button>
                </a>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg relative">
                <p class="text-gray-900 font-semibold text-2xl">Comptes</p>
                <div>
                <p class="text-gray-500 text-lg inline-block">{{ count($comptes) }}</p>
                <a href="{{route('compte.index')}}">
                    <button class=" hover:bg-gray-200 right-2.5 absolute rounded-lg  px-3 py-2   text-blue-500">voir plus </button>
                </a>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg relative">
                <p class="text-gray-900 font-semibold text-2xl">Virements</p>
                <div>
                <p class="text-gray-500 text-lg inline-block">{{ count($virements) }}</p>
                <a href="{{route('virement.index')}}">
                    <button class=" hover:bg-gray-200 right-2.5 absolute rounded-lg  px-3 py-2   text-blue-500">voir plus </button>
                </a>
                </div>
            </div>
        </div>
    </div>
   <!-- Section: Latest Records -->
    <div class="p-6 bg-gray rounded-lg my-1.5">
        <div class="flex justify-between items-center mb-4">
            <p class="text-gray-900 font-semibold text-3xl px-4 py-2 rounded-lg">Derniers ajouts</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Latest Clients -->
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-900 font-semibold text-2xl">Derniers clients</p>
                <ul class="text-gray-500 text-lg">
                    @foreach ($latestClients as $client)
                        <li>{{ $client->nom }} {{ $client->prenom }}</li>
                    @endforeach
                </ul>
            </div>
            <!-- Latest Comptes -->
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-900 font-semibold text-2xl">Derniers comptes</p>
                <ul class="text-gray-500 text-lg">
                    @foreach ($latestComptes as $compte)
                        <li>RIB: {{ $compte->rib }} | Solde: {{ $compte->solde }}</li>
                    @endforeach
                </ul>
            </div>
            <!-- Latest Virements -->
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-900 font-semibold text-2xl">Derniers virements</p>
                <ul class="text-gray-500 text-lg">
                    @foreach ($latestVirements as $virement)
                        <li> - <b class="text-black">Montant:</b> {{ $virement->montant }} DH <br> <b>De:</b> {{ $virement->compteEmetteur->client->nom }} <b>Vers:</b> {{ $virement->compteRecepteur->client->nom }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
