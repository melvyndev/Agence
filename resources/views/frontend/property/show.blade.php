@extends('frontend.app')

@section('content')
<div class="container mx-auto py-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Section de gauche : Détails de la propriété -->
        <div class="md:col-span-2 bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-4xl font-bold text-orange-600 mb-4">{{ $property->title }}</h1>

            @if($property->image)
                <img src="{{ $property->imageUrl() }}" alt="{{ $property->title }}" class="w-full h-72 object-cover rounded-lg shadow-sm mb-4">
            @endif

            <p class="text-gray-600 text-lg"><i class="fas fa-map-marker-alt text-orange-500"></i> {{ $property->city }}, {{ $property->address }} - {{ $property->postal_code }}</p>

            <hr class="my-6 border-gray-300">

            <div class="space-y-4">
                <h2 class="text-2xl font-semibold text-gray-800">Description</h2>
                <p class="text-gray-700 text-lg">{{ $property->description }}</p>

                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div class="space-y-2">
                        <p class="text-gray-700"><strong>Surface:</strong> {{ $property->surface }} m²</p>
                        <p class="text-gray-700"><strong>Pièces:</strong> {{ $property->rooms }}</p>
                        <p class="text-gray-700"><strong>Chambres:</strong> {{ $property->bedrooms }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-gray-700"><strong>Étage:</strong> {{ $property->floor }}</p>
                        <p class="text-gray-700"><strong>Prix:</strong> <span class="text-orange-600 font-semibold">{{ number_format($property->price, 2, ',', ' ') }} €</span></p>
                        <p class="text-gray-700"><strong>Vendu:</strong> <span class="{{ $property->sold ? 'text-red-500' : 'text-green-500' }}">{{ $property->sold ? 'Oui' : 'Non' }}</span></p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Section de droite : Formulaire de contact -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold text-orange-600 mb-6">Contactez-nous</h2>
            @include('frontend.components.contact', ['property' => $property])
        </div>
    </div>
</div>
@endsection
