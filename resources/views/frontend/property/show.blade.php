@extends('frontend.app')

@section('content')
<div class="container mx-auto mt-10 mb-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Section de gauche : Détails de la propriété -->
        <div class="md:col-span-2">
            <h1 class="text-3xl font-bold text-orange-600 py-2">{{ $property->title }}</h1>
            @if($property->image)
<img src="{{ $property->imageUrl() }}" alt="{{ $property->title }}"class="w-full h-64 object-cover">

@endif
            <p class="text-gray-600 mt-2">{{ $property->city }}, {{ $property->address }} - {{ $property->postal_code }}</p>

            <div class="mt-6 space-y-4">
                <p class="text-lg text-gray-700"><strong>Description:</strong></p>
                <p class="text-gray-700">{{ $property->description }}</p>

                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div>
                        <p class="text-gray-700"><strong>Surface:</strong> {{ $property->surface }} m²</p>
                        <p class="text-gray-700"><strong>Pièces:</strong> {{ $property->rooms }}</p>
                        <p class="text-gray-700"><strong>Chambres:</strong> {{ $property->bedrooms }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700"><strong>Étage:</strong> {{ $property->floor }}</p>
                        <p class="text-gray-700"><strong>Prix:</strong> <span class="text-orange-600 font-semibold">{{ number_format($property->price, 2, ',', ' ') }} €</span></p>
                        <p class="text-gray-700"><strong>Vendu:</strong> {{ $property->sold ? 'Oui' : 'Non' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section de droite : Formulaire de contact -->
        <div>
          @include('frontend.components.contact',['property' => $property])
        </div>
    </div>
</div>
@endsection
