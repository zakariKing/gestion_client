<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css') <!-- Correct way to include Tailwind CSS via Vite -->
</head>
<body class="bg-gray-100 min-h-screen">
<!-- Page Content -->
<main class="container mx-auto mt-28  min-h-screen">
    <x-Navbar/>
    <p class=" text-5xl my-10 text-center">@yield('Page_title')</p>
    @yield('content')
</main>

<!-- Footer (optional) -->
 <footer class="text-center mt-8 p-4 bg-gray-800 text-white  w-full">
     &copy; Zakariae Bakkari - 2024
 </footer>
</body>
</html>
