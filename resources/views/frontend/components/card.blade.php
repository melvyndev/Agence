<div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
    <img src="{{ $property->imageUrl() }}" alt="{{ $property->title }}" class="w-full h-48 object-cover">
    <div class="p-6">
        <h3 class="text-2xl font-semibold text-orange-600 mb-2">{{ $property->title }}</h3>
        <p class="text-gray-700 mb-4">{{ Str::limit($property->description, 100) }}</p>

        <div class="flex items-center justify-between mb-4">
            <span class="flex items-center text-gray-600">
                <svg class="w-5 h-5 mr-1 text-orange-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2a4 4 0 00-4 4v9h16V6a4 4 0 00-4-4H6zm12 4h-2V6a3 3 0 00-3-3H7a3 3 0 00-3 3v1H2V6a4 4 0 014-4h8a4 4 0 014 4v1zM4 10v2h2v-2H4zm10 0v2h2v-2h-2zm-6 4v2h2v-2H8z"/></svg>
                {{ $property->surface }} m²
            </span>
            <span class="flex items-center text-gray-600">
                <svg class="w-5 h-5 mr-1 text-orange-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 3a7 7 0 00-7 7h1a6 6 0 0112 0h1a7 7 0 00-7-7zm0 10a3 3 0 110-6 3 3 0 010 6zm7-5h-2V7h2v1zm-10 4h-2v-1h2v1zm6 0h2v-1h-2v1zm2-2h-2V8h2v2zm-6 0h-2V8h2v2z"/></svg>
                {{ $property->rooms }} pièces
            </span>
            <span class="flex items-center text-gray-600">
                <svg class="w-5 h-5 mr-1 text-orange-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 2a2 2 0 00-2 2h-3a4 4 0 00-4 4v8h16V8a4 4 0 00-4-4h-3a2 2 0 00-2-2zM7 6h6v6H7V6zm9 7H4v2h12v-2z"/></svg>
                {{ $property->bedrooms }} chambres
            </span>
        </div>

        <p class="text-lg font-semibold text-gray-800 mb-4">Prix : {{ number_format($property->price, 2, ',', ' ') }} €</p>

        <a href="{{ route('frontend.property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}" class="block text-center bg-orange-600 text-white font-semibold py-2 rounded hover:bg-orange-700 transition duration-300">
            Voir plus
        </a>
    </div>
</div>
