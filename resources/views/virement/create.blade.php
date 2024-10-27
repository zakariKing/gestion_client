@extends('layouts.app')
@section('title', ' Effectuer un Virement')
@section('content')
    <x-Navbar/>
    @if(session('error'))
        <x-alert type="error" message="{{ session('error') }}" timer="3000"/>
    @endif
    <div class="w-full flex justify-center pb-20">
        <form action="{{ route('virement.store') }}" method="POST" class="space-y-4 p-6 border w-2/3 rounded-xl bg-white">
            @csrf

            <p class="text-2xl">Informations d'émetteur</p>
            <div>
                <label for="client_emetteur" class="block text-sm font-medium text-gray-700">Client émetteur</label>
                <select id="client_emetteur" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-800 outline-none" onchange="updateComptes('emetteur')">
                    <option value="">Sélectionnez un client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="compte_emetteur" class="block text-sm font-medium text-gray-700 my-2">Compte émetteur</label>
                <select name="compte_emetteur" id="compte_emetteur" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-800 outline-none">
                    <option value="">Sélectionnez un compte</option>
                </select>
            </div>

            <p class="text-2xl">Informations de récepteur</p>
            <div>
                <label for="client_recepteur" class="block text-sm font-medium text-gray-700 my-2">Client récepteur</label>
                <select id="client_recepteur" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-800 outline-none" onchange="updateComptes('recepteur')">
                    <option value="">Sélectionnez un client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="compte_recepteur" class="block text-sm font-medium text-gray-700 my-2">Compte récepteur</label>
                <select name="compte_recepteur" id="compte_recepteur" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-800 outline-none">
                    <option value="">Sélectionnez un compte</option>
                </select>
            </div>

            <div>
                <label for="montant" class="block text-sm font-medium text-gray-700  my-2">Montant du virement</label>
                <input type="number" name="montant" id="montant" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-800 outline-none" min="0" step="0.01" required>
            </div>

            <div class="text-center">
                <button type="submit" class="w-full bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-black focus:outline-none focus:ring-2 focus:ring-gray-800">
                    Effectuer le virement
                </button>
            </div>
        </form>
    </div>

    <script>
        const clients = @json($clients);

        function updateComptes(type) {
            const clientId = document.getElementById(`client_${type}`).value;
            const compteSelect = document.getElementById(`compte_${type}`);
            compteSelect.innerHTML = '<option value="">Sélectionnez un compte</option>';

            const client = clients.find(c => c.id == clientId);
            if (client && client.comptes) {
                client.comptes.forEach(compte => {
                    const option = document.createElement('option');
                    option.value = compte.id;
                    option.text = `${compte.rib} - Solde: ${compte.solde}`;
                    compteSelect.appendChild(option);
                });
            }
        }
    </script>
@endsection
