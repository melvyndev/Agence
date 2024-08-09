@extends('frontend.app')
@section('content')
    <div class="container mx-auto py-8">
        <!-- Section À propos -->
        <section id="about" class="py-12">
            <h2 class="text-3xl font-bold text-center text-orange-600 mb-6">À propos de nous</h2>
            <p class="text-gray-700 text-center mx-auto max-w-2xl">
                Bienvenue chez IMMOBILI2, votre partenaire de confiance dans la recherche de propriétés d'exception. Nous
                sommes spécialisés dans la vente et la location de biens immobiliers haut de gamme.
            </p>
        </section>

        <!-- Section Propriétés en vedette -->
        <section id="featured-properties" class="py-12 bg-gray-100">
            <h2 class="text-3xl font-bold text-center text-orange-600 mb-6">Propriétés en vedette</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Exemple de carte de propriété -->
                @foreach ($properties as $property)
                    @include('frontend.components.card', ['property' => $property])
                @endforeach
                <!-- Répéter pour plus de propriétés -->
            </div>
        </section>

        <!-- Section Services -->
        <section id="services" class="py-12">
            <h2 class="text-3xl font-bold text-center text-orange-600 mb-6">Nos Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div class="p-4">
                    <svg class="w-12 h-12 mx-auto mb-4 text-orange-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 12v7m-6-6l6-6m6 6-6-6m4 6h4m-4 0v7m0-7l4 4m-6 4h4"></path>
                    </svg>
                    <h3 class="text-xl font-bold">Vente de Propriétés</h3>
                    <p class="text-gray-600">Nous vous aidons à vendre vos biens rapidement et au meilleur prix.</p>
                </div>
                <div class="p-4">
                    <svg class="w-12 h-12 mx-auto mb-4 text-orange-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10v11a1 1 0 001 1h16a1 1 0 001-1V10m-5 10v-6h4l-10-9-10 9h4v6m5-7h4v7h-4v-7z"></path>
                    </svg>
                    <h3 class="text-xl font-bold">Location de Biens</h3>
                    <p class="text-gray-600">Trouvez votre prochaine maison avec notre sélection de locations.</p>
                </div>
                <div class="p-4">
                    <svg class="w-12 h-12 mx-auto mb-4 text-orange-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L3 10h10zM13 21l10-8h-4v-2a2 2 0 00-2-2h-4v7h4v3l-4 2z"></path>
                    </svg>
                    <h3 class="text-xl font-bold">Conseil en Investissement</h3>
                    <p class="text-gray-600">Recevez des conseils d'experts pour vos investissements immobiliers.</p>
                </div>
            </div>
        </section>

        <!-- Section Témoignages -->
        <section id="testimonials" class="py-12 bg-gray-100">
            <h2 class="text-3xl font-bold text-center text-orange-600 mb-6">Témoignages</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Exemple de témoignage -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="text-gray-700 mb-4">"IMMOBILI2 a trouvé la maison de mes rêves en un temps record. Je
                        recommande fortement leurs services."</p>
                    <p class="text-orange-600 font-bold">Jean Dupont</p>
                </div>
                <!-- Répéter pour plus de témoignages -->
            </div>
        </section>

        <!-- Section Contact -->
        <section id="contact" class="py-12">
            <h2 class="text-3xl font-bold text-center text-orange-600 mb-6">Contactez-nous</h2>
            <form action="#" method="POST" class="max-w-xl mx-auto">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nom</label>
                    <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg"
                        required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg"
                        required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                    <textarea id="message" name="message" class="w-full p-3 border border-gray-300 rounded-lg" rows="5" required></textarea>
                </div>
                <button type="submit"
                    class="w-full bg-orange-600 text-white font-bold py-3 rounded-lg hover:bg-orange-700">Envoyer</button>
            </form>
        </section>
    </div>

@endsection
