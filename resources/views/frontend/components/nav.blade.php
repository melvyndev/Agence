<nav class="bg-white shadow-md">
    <div class="container mx-auto p-4 flex justify-between items-center">
        <!-- Logo / Titre -->
        <div class="text-orange-600 text-2xl font-bold">
            IMMOBILI2
        </div>

        <!-- Bouton pour menu mobile -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-orange-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Liens de navigation -->
        <div id="menu" class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-orange-600">Accueil</a>
            <a href="{{ route('frontend.property.index') }}" class="text-gray-600 hover:text-orange-600">Propriétés</a>
            <a href="{{ route('services') }}" class="text-gray-600 hover:text-orange-600">Services</a>
            <a href="{{ route('contact') }}" class="text-gray-600 hover:text-orange-600">Contact</a>
        </div>
    </div>

    <!-- Menu mobile -->
    <div id="mobile-menu" class="hidden md:hidden">
        <a href="{{ route('home') }}" class="block text-gray-600 hover:text-orange-600 py-2 px-4">Accueil</a>
        <a href="{{ route('frontend.property.index') }}" class="block text-gray-600 hover:text-orange-600 py-2 px-4">Propriétés</a>
        <a href="{{ route('services') }}" class="block text-gray-600 hover:text-orange-600 py-2 px-4">Services</a>
        <a href="{{ route('contact') }}" class="block text-gray-600 hover:text-orange-600 py-2 px-4">Contact</a>
    </div>
</nav>

<script>
    document.getElementById('menu-toggle').onclick = function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    }
</script>
