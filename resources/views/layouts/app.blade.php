<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 text-gray-900">
        <div class="container mx-auto px-4">
            <header class="bg-green-500 text-white p-6 rounded-md mb-8">
                <h1 class="text-2xl font-bold">Subvention agricole</h1>
                <nav class="mt-4">
                    <a href="{{ route('subventions.index') }}" class="nav-link text-white hover:underline mr-4">Liste des subventions</a>
                    <a href="{{ route('formulaire') }}" class="nav-link text-white hover:underline">Delmande de subvention</a>
                </nav>
            </header>
    
            <main>
                @yield('content')
            </main>
    
            <footer class="bg-gray-800 text-white p-4 text-center mt-8">
                <p>&copy; 2024 Subventions Agricoles. Tous droits réservés.</p>
            </footer>
        </div>
    </body>
</html>
