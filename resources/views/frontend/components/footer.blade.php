<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <!-- Logo / Titre -->
        <div class="text-orange-500 text-xl font-bold mb-4 md:mb-0 px-4">
            melvyn-dev-immobilier
        </div>

        <!-- Liens de navigation -->
        <div class="flex space-x-4">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-orange-500">Accueil</a>
            <a href="{{ route('properties.index') }}" class="text-gray-400 hover:text-orange-500">Propriétés</a>
            <a href="{{ route('services') }}" class="text-gray-400 hover:text-orange-500">Services</a>
        </div>

        <!-- Informations supplémentaires -->
        <div class="text-gray-400 text-sm mt-4 md:mt-0">
            &copy; {{ date('Y') }} melvyn-dev-immobilier. Tous droits réservés.
        </div>
    </div>
</footer>
