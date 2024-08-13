@extends('frontend.app')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Propriétés</h1>

        <div>
            <form action="{{ url()->current() }}" method="GET" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <input value="{{ request()->get('surface') }}" type="number" name="surface" placeholder="Surface minimum" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <input value="{{ request()->get('rooms') }}" type="number" name="rooms" placeholder="Nombre de pieces" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <input value="{{ request()->get('bedrooms') }}" type="number" name="bedrooms" placeholder="Nombre de chambres" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <input value="{{ request()->get('title') }}" type="text" name="title" placeholder="Titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($properties as $property)
                    @include('frontend.components.card', ['property' => $property])
            @empty
                <p>Pas de propriétés</p>
            @endforelse
        </div>

        <div class="mt-8 flex justify-center">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
