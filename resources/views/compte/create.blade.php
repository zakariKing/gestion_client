@extends('layouts.app')
@section('title','crée un compte')
@section('content')
    <nav aria-label="Breadcrumb" class="flex items-center space-x-4 bg-gray-100">
        @if($errors->any())
            @foreach ($errors as $error)
                <div class="text-red-500">$error</div>
            @endforeach
        @endif
        <ol role="list" class="flex items-center space-x-4">
            <!-- Home Breadcrumb -->
            <li>
                <div>
                    <a href="#" class="text-gray-500 hover:text-black flex items-center space-x-1">
                        <!-- Home Icon -->
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M9.293 2.293a1 1 0 0 1 1.414 0l7 7A1 1 0 0 1 17 11h-1v6a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6H3a1 1 0 0 1-.707-1.707l7-7Z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1">Home</span>
                    </a>
                </div>
            </li>

            <!-- Separator -->
            <li>
                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                          clip-rule="evenodd"></path>
                </svg>
            </li>

            <!-- Projects Breadcrumb -->
            <li>
                <div>
                    <a href="{{Route('compte.index')}}" class="text-gray-500 hover:text-black">compte</a>
                </div>
            </li>

            <!-- Separator -->
            <li>
                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                          clip-rule="evenodd"></path>
                </svg>
            </li>

            <!-- Project Nero Breadcrumb -->
            <li>
                <div>
                    <a href="{{Route('compte.create')}}" aria-current="page" class="text-black">create</a>
                </div>
            </li>
        </ol>
    </nav>


    <!-- resources/views/compte/create.blade.php -->
    <div class="bg-gray-100 flex items-center justify-center mt-28 selection:bg-indigo-500 selection:text-white">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
            <h1 class="text-2xl font-bold mb-6 text-gray-700 text-center">Crèe un compte</h1>
            <form action="{{ route('compte.store') }}" method="POST" class="space-y-4">
                @csrf
                @method('post')

                <!-- rib -->
                <div>
                    <label for="rib" class="block text-gray-600 mb-1">Rib</label>
                    <input value="{{ old('rib') }}" title="Enter le RIB" required type="text" id="rib" name="rib"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-black outline-none"
                           placeholder="Rib">
                    @error('rib')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- solde -->
                <div>
                    <label for="solde" class="block text-gray-600 mb-1">solde</label>
                    <input value="0" title="Enter the compte's solde" required type="number" id="solde" name="solde"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-black outline-none"
                           placeholder="solde">
                    @error('solde')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="client_id" class="block text-gray-600 mb-1">Client</label>
                    <select name="client_id" id="client_id"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-black outline-none"
                            required>
                        <option value="">Sélectionnez un client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                        @endforeach
                    </select>
                    @error('client_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                            class="bg-gray-800 hover:bg-black text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-300">
                        Crée
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
