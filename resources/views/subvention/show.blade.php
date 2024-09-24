@extends('layouts.app')

@section('content')
    <header class="bg-gray-800 p-4 text-white">
        <h2 class="text-lg font-semibold">
            {{ $subvention->name ?? __('Afficher') . ' ' . __('Subvention') }}
        </h2>
    </header>

    <div class="py-8">
        <div class="max-w-4xl mx-auto space-y-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h1 class="text-lg font-semibold text-gray-900">{{ __('Afficher') }} Subvention</h1>
                <p class="text-sm text-gray-600">Détails de la subvention.</p>

                <div class="mt-6 border-t border-gray-200">
                    <dl class="divide-y divide-gray-200">
                        @if(!empty($subvention->nom_complet))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Nom Complet :</dt>
                                <dd class="text-gray-900">{{ $subvention->nom_complet }}</dd>
                            </div>
                        @endif
                        @if(!empty($subvention->email))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Email :</dt>
                                <dd class="text-gray-900">{{ $subvention->email }}</dd>
                            </div>
                        @endif
                        @if(!empty($subvention->type_agriculture))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Type d'Agriculture :</dt>
                                <dd class="text-gray-900">{{ $subvention->type_agriculture }}</dd>
                            </div>
                        @endif
                        @if(!empty($subvention->description_projet))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Description du Projet :</dt>
                                <dd class="text-gray-900">{{ $subvention->description_projet }}</dd>
                            </div>
                        @endif
                        @if(!empty($subvention->montant_demande))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Montant Demandé :</dt>
                                <dd class="text-gray-900">{{ $subvention->montant_demande }}</dd>
                            </div>
                        @endif
                        @if(!empty($subvention->telephone))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Téléphone :</dt>
                                <dd class="text-gray-900">{{ $subvention->telephone }}</dd>
                            </div>
                        @endif
                        @if(!empty($subvention->adresse))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Adresse :</dt>
                                <dd class="text-gray-900">{{ $subvention->adresse }}</dd>
                            </div>
                        @endif
                        @if(!empty($subvention->type_organisation))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Type d'Organisation :</dt>
                                <dd class="text-gray-900">{{ $subvention->type_organisation }}</dd>
                            </div>
                        @endif
                        @if(!empty($subvention->surface_exploitation))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Surface d'Exploitation :</dt>
                                <dd class="text-gray-900">{{ $subvention->surface_exploitation }}</dd>
                            </div>
                        @endif
                        @if(!empty($subvention->type_plantes))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Type de Plantes :</dt>
                                <dd class="text-gray-900">{{ $subvention->type_plantes }}</dd>
                            </div>
                        @endif
                        @if(!empty($subvention->nombre_animaux))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Nombre d'Animaux :</dt>
                                <dd class="text-gray-900">{{ $subvention->nombre_animaux }}</dd>
                            </div>
                        @endif
                    
                        @if(!empty($subvention->description_beneficiaire))
                            <div class="py-4 flex justify-between">
                                <dt class="font-medium text-gray-700">Description du Bénéficiaire :</dt>
                                <dd class="text-gray-900">{{ $subvention->description_beneficiaire }}</dd>
                            </div>
                        @endif
                    </dl>
                </div>

                <div class="mt-6 text-right">
                    <a href="{{ route('subventions.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
                        Retour
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
