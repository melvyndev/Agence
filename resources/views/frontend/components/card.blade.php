<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <img src="https://via.placeholder.com/640x480" alt="{{ $property->title }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="text-xl font-bold">{{ $property->title }}</h3>
        <p class="text-gray-600">{{ $property->description }}</p>
        <p  class="text-gray-600">
        surface : {{ $property->surface }} m2</p>

        <p class="text-gray-600">Prix : {{ $property->price }} €</p>

        <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}" class="text-orange-600 hover:underline">Voir plus</a>
    </div>
</div>
