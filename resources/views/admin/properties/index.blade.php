@extends('admin.admin')

@section('title', 'Les propriétés')

@section('content')
    <div class="p-6 bg-orange-50">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-orange-700">@yield('title')</h1>
            <a href='{{ route('admin.property.create') }}'
                class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                Créer une nouvelle propriété
            </a>
        </div>
        <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-orange-500 text-white">
                    <th class="px-4 py-2 text-left">Titre</th>
                    <th class="px-4 py-2 text-left">Surface</th>
                    <th class="px-4 py-2 text-left">Chambres</th>
                    <th class="px-4 py-2 text-left">Prix</th>
                    <th class="px-4 py-2 text-left">Ville</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <tr class="hover:bg-orange-100">
                        <td class="border-t border-orange-200 px-4 py-2">{{ $property->title }}</td>
                        <td class="border-t border-orange-200 px-4 py-2">{{ $property->surface }}m²</td>
                        <td class="border-t border-orange-200 px-4 py-2">{{ $property->bedrooms }}</td>
                        <td class="border-t border-orange-200 px-4 py-2">{{ number_format($property->price, 0, '.', ' ') }} €</td>
                        <td class="border-t border-orange-200 px-4 py-2">{{ $property->city }}</td>
                        <td class="border-t border-orange-200 px-4 py-2">
                            <a href="{{ route('admin.property.edit', $property) }}"
                                class="text-orange-600 hover:text-orange-800">Voir</a>
                            <form action="{{ route('admin.property.destroy', $property) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-orange-600 hover:text-orange-800" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette propriété ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($properties->count() == 0)
                    <tr>
                        <td class="border-t border-orange-200 px-4 py-2 text-center" colspan="6">Aucune propriété</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mt-4">
            {{ $properties->links() }}
        </div>
    </div>
@endsection
