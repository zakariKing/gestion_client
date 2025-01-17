@extends('layouts.app')
@section('title','Modifier le client '.$client->id)
@section('content')
    <nav aria-label="Breadcrumb" class="flex items-center space-x-4 bg-gray-100">
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
                    <a href="{{Route('client.index')}}" class="text-gray-500 hover:text-black">client</a>
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
                    <a aria-current="page" class="text-black">edit</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="bg-gray-100 flex items-center justify-center mt-28 selection:bg-black selection:text-white">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
            <h1 class="text-2xl font-bold mb-6 text-gray-700 text-center">editer le client d'id {{$client->id}}</h1>

            <form action="{{route('client.update',$client->id)}}" method="post" class="space-y-4">
                @csrf{{-- cross-site request forgen https://en.wikipedia.org/wiki/Cross-site_request_forgery https://www.youtube.com/watch?v=PBvFuVRCuMg--}}
                @method('PUT')
                <!-- Title -->
                <div>
                    <label for="nom" class="block text-gray-600 mb-1">nom</label>
                    <input value="{{$client->nom}}" title="enter the title of task" required type="text" id="nom"
                           name="nom"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2  focus:ring-black  outline-none"
                           placeholder="Enter task Title">
                </div>
                <!-- Posted By -->
                <div>
                    <label for="prenom" class="block text-gray-600 mb-1">prenom</label>
                    <input required type="text" id="prenom" name="prenom"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2  focus:ring-black outline-none i"
                           placeholder="prenom" value="{{$client->prenom}}">
                </div>


                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                            class="bg-gray-900 hover:bg-black text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-300">
                        Mis á jour
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
