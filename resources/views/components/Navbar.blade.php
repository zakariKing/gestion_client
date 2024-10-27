<nav class="bg-gray-800 blur-0 fixed top-0 left-0 w-full z-30" >
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
                <div>
                    <a class="text-3xl text-white font-semibold  cursor-pointer" href="">Ges Cli</a>
                </div>
                <div class="">
                    <div class="flex space-x-4">
                        <a href="{{route('dashboard')}}" class=" border-b-2 transition-all duration-200 border-transparent  px-3 py-2 text-sm font-medium text-gray-400 hover:border-b-2  hover:border-gray-200 hover:text-white" >dashboard</a>
                        <a href="{{route('client.index')}}" class=" border-b-2 transition-all duration-200 border-transparent  px-3 py-2 text-sm font-medium text-gray-400 hover:border-b-2  hover:border-gray-200 hover:text-white" >clients</a>
                        <a href="{{route('compte.index')}}" class=" border-b-2 transition-all duration-200 border-transparent px-3 py-2 text-sm font-medium text-gray-400 hover:border-b-2 hover:border-gray-200 hover:text-white">comptes</a>
                        <a href="/virement" class=" border-b-2 transition-all duration-200 border-transparent px-3 py-2 text-sm font-medium text-gray-400 hover:border-b-2 hover:border-gray-200 hover:text-white">virements</a>
                    </div>
                </div>
                <div></div>
        </div>
    </div>
</nav>
