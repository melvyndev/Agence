@extends('layouts.app') 

@section('title', __('Subventions'))

@section('content')
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white ">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Subventions') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Liste de toutes les {{ __('Subventions') }}.</p>
                        </div>
                    </div>  

                    <div class="flow-root mt-8">
                        @if($subventions->count())
                            <div class="overflow-x-auto">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full table-auto divide-y divide-gray-300">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>
                                                    <th scope="col" class="py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Nom Complet') }}</th>
                                                    <th scope="col" class="py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Email') }}</th>
                                                    <th scope="col" class="py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Type Agriculture') }}</th>
                                                    <th scope="col" class="py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Montant ') }}</th>
                                                    <th scope="col" class="py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Téléphone') }}</th>
                                                    <th scope="col" class="py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Adresse') }}</th>
                                                    <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                                @foreach ($subventions as $index => $subvention)
                                                    <tr class="{{ $index % 2 === 0 ? 'bg-gray-50' : '' }}">
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ $index + 1 }}</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $subvention->nom_complet }}</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $subvention->email }}</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $subvention->type_agriculture }}</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $subvention->montant_demande }}</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $subvention->telephone }}</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $subvention->adresse }}</td>
                                                    
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium">
                                                            <a href="{{ route('subventions.show', $subvention->id) }}" class="text-blue-600 font-bold hover:text-blue-900 mr-2">{{ __('Voir') }}</a>
                                                            <a href="{{ route('subventions.edit', $subvention->id) }}" class="text-green-600 font-bold hover:text-green-900 mr-2">{{ __('Modifier') }}</a>
                                                            <form action="{{ route('subventions.destroy', $subvention->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-red-600 font-bold hover:text-red-900" onclick="return confirm('Are you sure you want to delete?')">{{ __('Supprimer') }}</button>
                                                            </form>
                                                        </td>
                                                        
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 px-4">
                                {!! $subventions->withQueryString()->links() !!}
                            </div>
                        @else
                            <p class="mt-6 text-center text-gray-500">{{ __('No subventions found.') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection