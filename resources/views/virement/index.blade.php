@extends('layouts.app')
@section('title','virements')
@section('content')
    @section('Page_title','Virements')
    <x-Navbar/>
    @if(session('success'))
        <x-alert type="success" message="{{ session('success') }}" timer="3000"/>
    @endif
    <div class="p-6 bg-white shadow-md rounded-lg overflow-x-scroll">
        <div class="flex justify-between items-center mb-4">
            <p class="text-gray-900 font-semibold text-3xl px-4 py-2 rounded-lg">{{ count($virements) }} virements</p>
            <a href="{{ route('virement.create') }}" class="bg-black text-white px-4 py-2 rounded-lg">Effectuer</a>
        </div>

        <table class="w-full bg-white border min-w-700 mb-11" >
            <thead>
            <tr>
                <th class="px-4 py-2">id</th>
                <th class="px-4 py-2">Emetteur</th>
                <th class="px-4 py-2">Récepteur</th>
                <th class="px-4 py-2">Montant</th>
                <th class="px-4 py-2">Effectué à</th>
            </tr>
            </thead>
            <tbody>
            @foreach($virements as $virement)
                <tr>
                    <td class="border px-4 py-2">{{ $virement->id }}</td>
                    <td class="border px-4 py-2">{{ $virement->compteEmetteur->client->nom }} {{ $virement->compteEmetteur->client->prenom }} | {{$virement->compteEmetteur->rib}}</td>
                    <td class="border px-4 py-2">{{ $virement->compteRecepteur->client->nom }} {{ $virement->compteRecepteur->client->prenom }} | {{$virement->compteRecepteur->rib}}</td>
                    <td class="border px-4 py-2">{{ $virement->montant }} DH</td>
                    <td class="border px-4 py-2">{{ $virement->created_at ? $virement->created_at->format('d M Y') : '__' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
