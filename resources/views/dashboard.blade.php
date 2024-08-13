<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-lg mb-4">
                    Bienvenue sur le tableau de bord de <span class="text-orange-600 font-bold">melvyn-dev-immobilier</span>.
                </p>
                <p class="text-gray-600 mb-4">
                    Ici, vous pouvez consulter les dernières mises à jour, accéder aux statistiques importantes, et gérer vos paramètres. Explorez les différentes sections pour tirer le meilleur parti de votre application.
                </p>
                <!-- Ajoute des éléments supplémentaires ici -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="bg-blue-100 p-4 rounded-lg shadow">
                        <h3 class="font-semibold text-lg">Statistique 1</h3>
                        <p>Des détails intéressants sur la statistique 1.</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg shadow">
                        <h3 class="font-semibold text-lg">Statistique 2</h3>
                        <p>Des détails intéressants sur la statistique 2.</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-lg shadow">
                        <h3 class="font-semibold text-lg">Statistique 3</h3>
                        <p>Des détails intéressants sur la statistique 3.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
