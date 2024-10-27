@extends('layouts.app')
@section('title', 'Comptes')
@section('content')
    @section('Page_title', 'Comptes')
    @if(session('success'))
        <x-alert type="success" message="{{ session('success') }}" timer="3000"/>
    @endif
    @if(session('error'))
        <x-alert type="error" message="{{ session('error') }}" timer="3000"/>
    @endif


    <div class="p-6 bg-white shadow-md rounded-lg  overflow-x-scroll ">
        <div class="flex justify-between items-center mb-4">
            <p class=" text-gray-900 font-semibold text-3xl px-4 py-2 rounded-lg">{{count($comptes)}} comptes</p>
            <a href="{{ route('compte.create') }}" class="bg-black text-white px-4 py-2 rounded-lg">Ajouter</a>
        </div>

        <table class=" w-full bg-white border min-w-700 mb-11" border="1">
            <thead>
            <tr>
                <th class="px-4 py-2">client</th>
                <th class="px-4 py-2">rib</th>
                <th class="px-4 py-2">solde</th>
                <th class="px-4 py-2">Crée á</th>
                <th class="px-4 py-2">mis a jour a</th>
                <th class="px-4 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comptes as $compte)
                <tr>
                    <td class="border px-4 py-2">{{ $compte->client->nom }} {{$compte->client->prenom}}</td>
                    <td class="border px-4 py-2">{{ $compte->rib }}</td>
                    <td class="border px-4 py-2">{{ $compte->solde }} DH</td>
                    <td class="border px-4 py-2">{{ $compte->created_at  ? $compte->created_at->format('d M Y') : 'N/V'}}</td>
                    <td class="border px-4 py-2">{{ $compte->updated_at ? $compte->updated_at->format('d M Y'):'N/V'}}</td>
                    <td>
                        <div class="inline-flex justify-center">
                            <a href="{{ route('compte.edit', $compte->id) }}"
                               class="text-blue-500 hover:text-blue-700 px-2">Edit</a>
                            <form action="{{ route('compte.destroy', $compte->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 px-2">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">

        </div>
    </div>

    <script>
        const buttons = document.querySelectorAll('.dropdownButton');

        buttons.forEach((button) => {
            const menu = button.nextElementSibling;

            button.addEventListener('click', function () {
                // Hide other dropdowns
                buttons.forEach((otherButton) => {
                    const otherMenu = otherButton.nextElementSibling;
                    // Check if it's not the current button's menu
                    if (otherButton !== button) {
                        otherMenu.classList.add('hidden'); // Hide other menus
                    }
                });

                // Show the delete option regardless of the row
                const deleteLink = menu.querySelector('a.text-red-500');
                deleteLink.classList.remove('hidden'); // Ensure the delete option is visible

                // Toggle the current menu
                menu.classList.toggle('hidden');
            });
        });

    </script>
@endsection
