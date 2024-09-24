@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md bg-gray-100 animate-fadeIn">
    <h2 class="text-2xl font-bold mb-6 text-center">Formulaire de demande de subvention agricole</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 mb-6 rounded-md animate-fadeIn">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('subventions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="nom_complet" class="block text-sm font-medium text-gray-700">Nom complet :</label>
            <input type="text" name="nom_complet" id="nom_complet" class="mt-1 block w-full border border-gray-300 rounded-md p-2 transition-colors focus:outline-none focus:border-blue-500 @error('nom_complet') border-red-500 @enderror" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md p-2 transition-colors focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror" required>
        </div>

        <div class="mb-4">
            <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone :</label>
            <input type="text" name="telephone" id="telephone" class="mt-1 block w-full border border-gray-300 rounded-md p-2 transition-colors focus:outline-none focus:border-blue-500 @error('telephone') border-red-500 @enderror" required>
        </div>

        <div class="mb-4">
            <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse :</label>
            <input type="text" name="adresse" id="adresse" class="mt-1 block w-full border border-gray-300 rounded-md p-2 transition-colors focus:outline-none focus:border-blue-500 @error('adresse') border-red-500 @enderror" required>
        </div>

        <div class="mb-4">
            <label for="type_organisation" class="block text-sm font-medium text-gray-700">Type d'organisation :</label>
            <select name="type_organisation" id="type_organisation" class="mt-1 block w-full border border-gray-300 rounded-md p-2 transition-colors focus:outline-none focus:border-blue-500 @error('type_organisation') border-red-500 @enderror" required>
                <option value="">-- Sélectionnez --</option>
                <option value="entreprise">Entreprise</option>
                <option value="cooperative">Coopérative</option>
                <option value="individuel">Individuel</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="description_beneficiaire" class="block text-sm font-medium text-gray-700">Description du bénéficiaire / organisation :</label>
            <textarea name="description_beneficiaire" id="description_beneficiaire" class="mt-1 block w-full border border-gray-300 rounded-md p-2 transition-colors focus:outline-none focus:border-blue-500 @error('description_beneficiaire') border-red-500 @enderror" required></textarea>
        </div>

        <div class="mb-4">
            <label for="type_agriculture" class="block text-sm font-medium text-gray-700">Type d'agriculture :</label>
            <select name="type_agriculture" id="type_agriculture" class="mt-1 block w-full border border-gray-300 rounded-md p-2 transition-colors focus:outline-none focus:border-blue-500" required>
                <option value="">-- Sélectionnez --</option>
                <option value="céréalière">Céréalière</option>
                <option value="horticulture">Horticulture</option>
                <option value="élevage">Élevage</option>
            </select>
        </div>

        <!-- Champs dynamiques -->
        <div id="cereal_section" class="mb-4 hidden opacity-0 transition-opacity duration-500 ease-in-out">
            <label for="surface_exploitation" class="block text-sm font-medium text-gray-700">Surface de l'exploitation (hectares) :</label>
            <input type="number" name="surface_exploitation" id="surface_exploitation" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>

        <div id="horticulture_section" class="mb-4 hidden opacity-0 transition-opacity duration-500 ease-in-out">
            <label for="type_plantes" class="block text-sm font-medium text-gray-700">Type de plantes cultivées :</label>
            <input type="text" name="type_plantes" id="type_plantes" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>

        <div id="elevage_section" class="mb-4 hidden opacity-0 transition-opacity duration-500 ease-in-out">
            <label for="nombre_animaux" class="block text-sm font-medium text-gray-700">Nombre d'animaux :</label>
            <input type="number" name="nombre_animaux" id="nombre_animaux" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="description_projet" class="block text-sm font-medium text-gray-700">Description du projet :</label>
            <textarea name="description_projet" id="description_projet" class="mt-1 block w-full border border-gray-300 rounded-md p-2 transition-colors focus:outline-none focus:border-blue-500 @error('description_projet') border-red-500 @enderror" required></textarea>
        </div>

        <div class="mb-4">
            <label for="montant_demande" class="block text-sm font-medium text-gray-700">Montant de la subvention demandée :</label>
            <input type="number" name="montant_demande" id="montant_demande" class="mt-1 block w-full border border-gray-300 rounded-md p-2 transition-colors focus:outline-none focus:border-blue-500 @error('montant_demande') border-red-500 @enderror" required>
        </div>
{{-- 
        <div class="mb-4">
            <label for="piece_identite" class="block text-sm font-medium text-gray-700">Joindre une pièce d'identité (PDF, JPG, PNG - max 2MB) :</label>
            <input type="file" name="piece_identite" id="piece_identite" class="mt-1 block w-full text-gray-700">
        </div> --}}

        <button type="submit" class="w-full bg-green-500 text-white font-bold py-2 px-4 rounded-md hover:bg-green-600 transition-transform transform hover:scale-105">Envoyer la demande</button>
    </form>
</div>

<script>
    document.getElementById('type_agriculture').addEventListener('change', function () {
        var type = this.value;
        toggleSection('cereal_section', type === 'céréalière');
        toggleSection('horticulture_section', type === 'horticulture');
        toggleSection('elevage_section', type === 'élevage');
    });

    function toggleSection(sectionId, shouldShow) {
        const section = document.getElementById(sectionId);
        if (shouldShow) {
            section.classList.remove('hidden');
            setTimeout(() => {
                section.classList.remove('opacity-0');
            }, 10);
        } else {
            section.classList.add('opacity-0');
            setTimeout(() => {
                section.classList.add('hidden');
            }, 500); // Durée égale à la durée de l'animation de disparition
        }
    }
</script>
@endsection
