<div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300  hover:scale-105">
    <img src="{{ $property->imageUrl() }}" alt="{{ $property->title }}" class="w-full h-48 object-cover">
    <div class="p-6">
        <h3 class="text-2xl font-semibold text-orange-600 mb-2">{{ $property->title }}</h3>
        <p class="text-gray-700 mb-4">{{ Str::limit($property->description, 100) }}</p>

        <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
            <!-- Première colonne -->
            <div class="space-y-2">
                <span class="flex items-center text-gray-600">
                    <i class="fa-solid fa-up-right-and-down-left-from-center w-5 h-5 mr-2 text-orange-500"></i>
                    {{ $property->surface }} m²
                </span>
                <span class="flex items-center text-gray-600">
                    <i class="fa-regular fa-square w-5 h-5 mr-2 text-orange-500"></i>
                    {{ $property->rooms }} pièces
                </span>
            </div>
        
            <!-- Deuxième colonne -->
            <div class="space-y-2">
                <span class="flex items-center text-gray-600">
                    <i class="fa-solid fa-bed w-5 h-5 mr-2 text-orange-500"></i>
                    {{ $property->bedrooms }} chambres
                </span>
            </div>
        </div>
        

        <p class="text-lg font-semibold text-gray-800 mb-4">Prix : {{ number_format($property->price, 2, ',', ' ') }} €</p>

        <a href="{{ route('frontend.property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}" class="block text-center bg-orange-600 text-white font-semibold py-2 rounded hover:bg-orange-700 transition duration-300">
            Voir plus
        </a>
    </div>
</div>
